<?php


namespace Modules\Payment\Services;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Booking\Repositories\Contracts\BookingRepositoryInterface;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Payment\Entities\Payment;
use Modules\Payment\Repositories\Contracts\PaymentRepositoryInterface;
use Modules\Payment\Services\Contracts\PaymentServiceInterface;

class PaymentService implements PaymentServiceInterface
{
    /**
     * @var BookingRepositoryInterface
     */
    private $bookingRepository;
    /**
     * @var PaymentRepositoryInterface
     */
    private $paymentRepository;

    /**
     * PaymentService constructor.
     * @param BookingRepositoryInterface $bookingRepository
     * @param PaymentRepositoryInterface $paymentRepository
     */
    public function __construct(BookingRepositoryInterface $bookingRepository,
                                PaymentRepositoryInterface $paymentRepository)
    {
        $this->bookingRepository = $bookingRepository;
        $this->paymentRepository = $paymentRepository;
    }

    /**
     * @param Payment|null $payment
     * @return array
     */
    public function dataForm(Payment $payment = null)
    {
        $oldValue = [
            'status' => '',
        ];

        if ($payment) {
            $oldValue['status'] = $payment->status;
        }
        $status = Payment::statusName();
        $bookings = $this->bookingRepository->toArray('id', 'short_code', 'incomplete');

        return compact('oldValue', 'payment', 'status', 'bookings');
    }

    /**
     * @param $id
     * @param $status
     */
    public function updateStatus($id, $status)
    {
        // TODO: Implement updateStatus() method.
    }

    /**
     * @param array $attributes
     * @return Model
     * @throws RepositoryException
     */
    public function create(array $attributes)
    {
        DB::beginTransaction();

        try {
            $payment = $this->paymentRepository->create($attributes);
            if ($payment->status == Payment::STATUS_PAID) {
                $this->syncRelation($payment, $attributes);
            }

            DB::commit();

            return $payment;
        } catch (\Exception $e) {
            DB::rollback();
            logger([$e->getFile(), $e->getLine(), $e->getMessage()]);
            throw RepositoryException::createFailed();
        }
    }

    public function updateById($id, array $attributes)
    {
        DB::beginTransaction();

        try {
            $oldPayment = $this->paymentRepository->findById($id);
            $payment = $this->paymentRepository->updateById($id, $attributes);

            if ($oldPayment->status == Payment::STATUS_PENDING && $payment->status == Payment::STATUS_PAID) {
                $this->syncRelation($payment, ['price' => $payment->price]);
            }

            if ($oldPayment->status == Payment::STATUS_PAID && $payment->status == Payment::STATUS_PENDING) {
                $this->syncRelation($payment, ['price' => - ($oldPayment->price)]);
            }

            if ($oldPayment->status == Payment::STATUS_PAID && $payment->status == Payment::STATUS_PAID) {
                $this->syncRelation($payment, ['price' => $payment->price - $oldPayment->price]);
            }

            DB::commit();

            return $payment;
        } catch (\Exception $e) {
            DB::rollback();
            logger([$e->getFile(), $e->getLine(), $e->getMessage()]);
            throw RepositoryException::updateFailed();
        }
    }

    public function deleteById($id)
    {
        DB::beginTransaction();

        try {
            $payment = $this->paymentRepository->findById($id);
            $this->paymentRepository->delete($payment);
            if ($payment->status == Payment::STATUS_PAID) {
                $this->syncRelation($payment, ['price' => - ($payment->price)]);
            }
            DB::commit();

            return $payment;
        } catch (\Exception $e) {
            DB::rollback();
            logger([$e->getFile(), $e->getLine(), $e->getMessage()]);
            throw RepositoryException::deleteFailed();
        }
    }

    public function syncRelation(Model $payment, $attributes)
    {
        $this->bookingRepository->updatePaid($payment->booking_id, $attributes['price']);
    }
}
