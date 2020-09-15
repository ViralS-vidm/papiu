<?php


namespace Modules\Booking\Services;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Booking\Entities\Booking;
use Modules\Booking\Exceptions\BookingException;
use Modules\Booking\Exceptions\UpdateStatusException;
use Modules\Booking\Repositories\Contracts\BookingRepositoryInterface;
use Modules\Booking\Services\Contracts\BookingServiceInterface;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Payment\Entities\Payment;
use Modules\Payment\Repositories\Contracts\PaymentRepositoryInterface;
use Modules\Product\Repositories\Contracts\ProductRepositoryInterface;
use Modules\Product\Services\Contracts\ProductServiceInterface;
use Modules\Service\Repositories\Contracts\ServiceRepositoryInterface;

class BookingService implements BookingServiceInterface
{
    const DATA_DATE_TIME_FORMAT = 'Y-m-d';
    const USER_DATE_TIME_FORMAT = 'Y-m-d';

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;
    /**
     * @var BookingRepositoryInterface
     */
    private $bookingRepository;
    /**
     * @var ServiceRepositoryInterface
     */
    private $serviceRepository;
    /**
     * @var PaymentRepositoryInterface
     */
    private $paymentRepository;
    /**
     * @var ProductServiceInterface
     */
    private $productService;

    /**
     * BookingService constructor.
     * @param ProductRepositoryInterface $productRepository
     * @param BookingRepositoryInterface $bookingRepository
     * @param ServiceRepositoryInterface $serviceRepository
     * @param PaymentRepositoryInterface $paymentRepository
     * @param ProductServiceInterface $productService
     */
    public function __construct(ProductRepositoryInterface $productRepository,
                                BookingRepositoryInterface $bookingRepository,
                                ServiceRepositoryInterface $serviceRepository,
                                PaymentRepositoryInterface $paymentRepository,
                                ProductServiceInterface $productService)
    {
        $this->productRepository = $productRepository;
        $this->bookingRepository = $bookingRepository;
        $this->serviceRepository = $serviceRepository;
        $this->paymentRepository = $paymentRepository;
        $this->productService = $productService;
    }

    /**
     * @param Booking|null $booking
     * @return array
     */
    public function dataForm(Booking $booking = null)
    {
        $oldValue = [
            'product_id' => '',
            'status'     => '',
            'services'   => [],
            'time_start' => '',
            'time_end'   => ''
        ];

        if ( ! is_null($booking)) {
            $oldValue['services'] = $booking->services->pluck('id')->toArray();
            $oldValue['time_start'] = $booking->time_start;
            $oldValue['time_end'] = $booking->time_end;
        }
        $products = $this->productRepository->toArray('id', 'name');
        $services = $this->serviceRepository->toArray('id', 'name', 'publish');
        $status = Booking::statusName();

        return compact('oldValue', 'products', 'booking', 'status', 'services');
    }

    /**
     * @param array $attributes
     * @return Model | bool
     * @throws RepositoryException
     * @throws BookingException
     */
    public function create(array $attributes)
    {
        DB::beginTransaction();

        $this->verifyBookingCreate($attributes);
        $attributes = $this->handlePrice($attributes);

        $booking = $this->bookingRepository->create($attributes);
        $this->syncRelation($booking, $attributes);

        DB::commit();

        return $booking;

    }

    /**
     * @param $attribute
     * @return void
     * @throws BookingException
     */
    public function verifyBookingCreate($attribute)
    {
        $allBooking = $this->bookingRepository->incomplete()->where('product_id', $attribute['product_id']);
        $can = true;
        foreach ($allBooking as $booking) {
            $can = $can && ($booking->time_start >= $attribute['time_end'] || $booking->time_end <= $attribute['time_start']);
        }
        if ( ! $can) {
            throw new BookingException();
        }
    }

    /**
     * @param $attribute
     * @return void
     * @throws RepositoryException
     */
    public function verifyBookingUpdate($attribute)
    {
        $allBooking = $this->bookingRepository->incomplete()
            ->where('product_id', $attribute['product_id'])
            ->where('id', '<>', $attribute['id']);

        $can = true;
        if ($allBooking->count()) {
            foreach ($allBooking as $booking) {
                $can = $can && ($booking->time_start >= $attribute['time_end'] || $booking->time_end <= $attribute['time_start']);
            }
        } else {
            $can = true;
        }
        if ( ! $can) {
            throw new RepositoryException;
        }
    }

    /**
     * @param $id
     * @param array $attributes
     * @return Model | bool
     * @throws RepositoryException
     */
    public function updateById($id, array $attributes)
    {
        DB::beginTransaction();

        try {
            $attributes['id'] = $id;

            $this->verifyBookingUpdate($attributes);
            $attributes = $this->handlePrice($attributes);

            $model = $this->bookingRepository->findById($id);
            $this->bookingRepository->update($model, $attributes);
            $this->syncRelation($model, $attributes);

            DB::commit();

            return $model;
        } catch (\Exception $e) {
            DB::rollback();
            logger([$e->getFile(), $e->getLine(), $e->getMessage()]);
            throw RepositoryException::updateFailed();
        }

    }

    /**
     * @param $attributes
     * @return void
     * @throws \Exception
     */
    public function verifyFormatDate($attributes)
    {
        if ($attributes['time_end'] <= $attributes['time_start'] ||
            $attributes['time_start'] < now()->format(self::USER_DATE_TIME_FORMAT)) {
            $attributes['total_price'] = 0;
            throw new \Exception('Invalid format');
        }

        Carbon::createFromFormat(self::USER_DATE_TIME_FORMAT, $attributes['time_start']);
        Carbon::createFromFormat(self::USER_DATE_TIME_FORMAT, $attributes['time_end']);
    }

    /**
     * @param $attributes
     * @return float
     */
    public function handlePrice($attributes)
    {
        try {
            $this->verifyFormatDate($attributes);

            $attributes['total_price'] = 0;

            $product = $this->productRepository->findById($attributes['product_id']);
            $timeStart = Carbon::create($attributes['time_start']);
            $timeEnd = Carbon::create($attributes['time_end']);

            $roomPrice = $timeEnd->gte($timeStart) ? $timeEnd->diffInDays($timeStart) * $product->price_per_day : 0;


            $attributes['room_price'] = round($roomPrice, 2);
            $attributes['total_price'] += $roomPrice;

            if (isset($attributes['services'])) {
                $servicePrice = $this->serviceRepository->whereIn('id', $attributes['services'])->sum('price');
                $attributes['service_price'] = round($servicePrice, 2);
                $attributes['total_price'] += $servicePrice;
            }
            $attributes['total_price'] = round($attributes['total_price'], 2);

            return $attributes;
        } catch (\Exception $e) {
            $attributes['total_price'] = null;

            return $attributes;
        }

    }


    /**
     * @param Model $booking
     * @param $attributes
     */
    public function syncRelation(Model $booking, $attributes)
    {
        if (isset($attributes['services']) && is_array($attributes['services'])) {
            $attributes['services'] = array_filter($attributes['services']);
            $this->serviceRepository->syncServices($booking, []);
            $this->serviceRepository->attachServices($booking, $attributes['services']);
        }
    }

    /**
     * @param $id
     * @param $status
     * @return Model
     * @throws RepositoryException
     * @throws UpdateStatusException
     */
    public function updateStatus($id, $status)
    {
        $model = $this->bookingRepository->findById($id);

        if ( ! $this->verifyStatus($model, $status)) {
            throw UpdateStatusException::notHasStatus(Booking::statusName()[ $this->getPrevStatus($status) ]);
        };

        if ( ! $this->verifyPayment($model, $status)) {
            throw UpdateStatusException::notPaidEnough();
        };

        $field = $this->getFieldTimeUpdate($status);

        return $this->bookingRepository->update($model, array_merge(['status' => $status], $field));
    }

    /**
     * @param Booking $model
     * @param $status
     * @return bool
     */
    public function verifyStatus(Booking $model, $status)
    {
        $prevStatus = $this->getPrevStatus($status);

        return $model->status == $prevStatus;
    }

    /**
     * @param Booking $model
     * @param $status
     * @return bool
     */
    public function verifyPayment(Booking $model, $status)
    {
        if ($status == Booking::STATUS_CHECKED_COMPLETED) {
            $moneyPaid = $this->paymentRepository->sumPricePayment($model, Payment::STATUS_PAID);

            return $moneyPaid >= $model->total_price;
        }

        return true;
    }

    /**
     * @param $status
     * @return int
     */
    public function getPrevStatus($status)
    {
        if ($status == Booking::STATUS_CHECKED_IN) {
            return Booking::STATUS_NEW;
        }

        if ($status == Booking::STATUS_CHECKED_OUT) {
            return Booking::STATUS_CHECKED_IN;
        }

        if ($status == Booking::STATUS_CHECKED_COMPLETED) {
            return Booking::STATUS_CHECKED_OUT;
        }

        return - 1;
    }

    /**
     * @param $status
     * @return int
     */
    public function getNextStatus($status)
    {
        if ($status == Booking::STATUS_NEW) {
            return Booking::STATUS_CHECKED_IN;
        }

        if ($status == Booking::STATUS_CHECKED_IN) {
            return Booking::STATUS_CHECKED_OUT;
        }

        if ($status == Booking::STATUS_CHECKED_OUT) {
            return Booking::STATUS_CHECKED_COMPLETED;
        }

        return - 1;
    }

    /**
     * @param $status
     * @return array
     */
    public function getFieldTimeUpdate($status)
    {
        if ($status == Booking::STATUS_CHECKED_IN) {
            return ['checked_in_at' => now()];
        }

        if ($status == Booking::STATUS_CHECKED_OUT) {
            return ['checked_out_at' => now()];
        }

        if ($status == Booking::STATUS_CHECKED_COMPLETED) {
            return ['completed_at' => now()];
        }

        return [];
    }
}
