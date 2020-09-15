<?php


namespace Modules\Product\Services;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Booking\Repositories\Contracts\BookingRepositoryInterface;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Image\Repositories\Contracts\ImageRepositoryInterface;
use Modules\Image\Services\Contracts\ImageServiceInterface;
use Modules\Product\Entities\Product;
use Modules\Product\Exceptions\ProductBookingException;
use Modules\Product\Repositories\Contracts\ProductConvenienceRepositoryInterface;
use Modules\Product\Repositories\Contracts\ProductRepositoryInterface;
use Modules\Product\Services\Contracts\ProductServiceInterface;

class ProductService implements ProductServiceInterface
{
    const DATE_TIME_FORMAT = 'Y-m-d';
    /**
     */
    private $productConvenienceRepository;

    /**
     * @var ImageRepositoryInterface
     */
    private $imageService;
    /**
     * @var ImageRepositoryInterface
     */
    private $imageRepository;
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;
    /**
     * @var BookingRepositoryInterface
     */
    private $bookingRepository;

    /**
     * FeedbackRepository constructor.
     * @param Product $product
     * @param ProductConvenienceRepositoryInterface $productConvenienceRepository
     * @param ImageServiceInterface $imageService
     * @param ImageRepositoryInterface $imageRepository
     * @param ProductRepositoryInterface $productRepository
     * @param BookingRepositoryInterface $bookingRepository
     */
    public function __construct(Product $product,
                                ProductConvenienceRepositoryInterface $productConvenienceRepository,
                                ImageServiceInterface $imageService,
                                ImageRepositoryInterface $imageRepository,
                                ProductRepositoryInterface $productRepository,
                                BookingRepositoryInterface $bookingRepository
    )
    {
        $this->productConvenienceRepository = $productConvenienceRepository;
        $this->imageService = $imageService;
        $this->imageRepository = $imageRepository;
        $this->productRepository = $productRepository;
        $this->bookingRepository = $bookingRepository;
    }

    /**
     * @param array $attributes
     * @return Model | bool
     * @throws RepositoryException
     */
    public function create(array $attributes)
    {
        DB::beginTransaction();

        try {
            $product = $this->productRepository->create($attributes);
            $this->syncRelation($product, $attributes);

            DB::commit();

            return $product;
        } catch (\Exception $e) {
            DB::rollback();
            logger([$e->getFile(), $e->getLine(), $e->getMessage()]);
            throw RepositoryException::createFailed();
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
            $model = $this->productRepository->findById($id);
            $this->productRepository->update($model, $attributes);
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
     * @param Model $product
     * @param $attributes
     */
    public function syncRelation(Model $product, $attributes)
    {
        // update convenience
        $product->conveniences()->sync($attributes['conveniences']);

        // sync image
        $this->imageService->syncImage($product, $attributes);
    }

    /**
     * @param Product $product
     * @return array
     */
    public function dataForm(Product $product = null)
    {
        $oldValue = [
            'conveniences' => [],
            'home_image' => [],
            'detail_image' => [],
        ];

        if (!is_null($product)) {
            $oldValue['conveniences'] = $product->conveniences->pluck('id')->toArray();

            $oldValue['home_image'] = $product->homeImage->pluck('thumbnail_url', 'id')->toArray();
            $oldValue['detail_image'] = $product->detailImages->pluck('thumbnail_url', 'id')->toArray();
        }
        $conveniences = $this->productConvenienceRepository->toArray('id', 'name');
        $thumbnails = $this->imageRepository->toArray('id', 'thumbnail_url');


        return compact('oldValue', 'conveniences', 'thumbnails', 'product');
    }

    /**
     * @param $params
     * @return mixed
     * @throws ProductBookingException
     */
    public function findFree($params)
    {
        try {
            if ($params['time_end'] <= $params['time_start'] ||
                $params['time_start'] < now()->format(self::DATE_TIME_FORMAT)) {
                return collect([]);
            }

            Carbon::createFromFormat(self::DATE_TIME_FORMAT, $params['time_start']);
            Carbon::createFromFormat(self::DATE_TIME_FORMAT, $params['time_end']);
        } catch (\Exception $e) {
            return collect([]);
        }

        $productNotBook = $this->getBookingCanInTime($params);

        $products = $this->productRepository->whereNotIn('id', $productNotBook)->get();
        if (!$products->count()) {
            throw ProductBookingException::noFreeProduct();
        }

        return $products;
    }

    /**
     * @param $params
     * @return array
     */
    public function getBookingCanInTime($params)
    {
        $allBooking = $this->bookingRepository->incomplete();
        $productNotBook = [];
        foreach ($allBooking as $booking) {
            if (!($booking->time_start >= $params['time_end'] || $booking->time_end <= $params['time_start'])) {
                $productNotBook[] = $booking->product_id;
            };
        }

        return $productNotBook;
    }
}
