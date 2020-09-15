<?php


namespace Modules\Service\Services;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Image\Repositories\Contracts\ImageRepositoryInterface;
use Modules\Image\Services\Contracts\ImageServiceInterface;
use Modules\Service\Entities\Offer;
use Modules\Service\Repositories\Contracts\OfferRepositoryInterface;
use Modules\Service\Services\Contracts\OfferServiceInterface;

class OfferService implements OfferServiceInterface
{
    /**
     * @var ImageRepositoryInterface
     */
    private $imageRepository;
    /**
     * @var OfferRepositoryInterface
     */
    private $offerRepository;
    /**
     * @var ImageServiceInterface
     */
    private $imageService;

    public function __construct(ImageRepositoryInterface $imageRepository,
                                OfferRepositoryInterface $offerRepository,
                                ImageServiceInterface $imageService)
    {
        $this->imageRepository = $imageRepository;
        $this->offerRepository = $offerRepository;
        $this->imageService = $imageService;
    }

    /**
     * @param Offer|null $offer
     * @return array
     */
    public function dataForm(Offer $offer = null)
    {
        $oldValue = [
            'home_image' => [],
        ];

        if (!is_null($offer)) {
            $oldValue['home_image'] = $offer->homeImage->pluck('thumbnail_url', 'id')->toArray();
        }
        $thumbnails = $this->imageRepository->toArray('id', 'thumbnail_url');

        return compact('oldValue', 'thumbnails', 'offer');
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
            $input = array_diff_key($attributes, array_flip(["home_image_upload", "home_image_choice"]));
            $offer = $this->offerRepository->create($input);
            $this->syncRelation($offer, $attributes);

            DB::commit();

            return $offer;
        } catch (\Exception $e) {
            DB::rollback();
            logger([$e->getFile(), $e->getLine(), $e->getMessage()]);
            throw RepositoryException::createFailed();
        }
    }

    /**
     * @param $id
     * @param array $attributes
     * @return Model
     * @throws RepositoryException
     */
    public function updateById($id, array $attributes)
    {
        DB::beginTransaction();

        try {
            $model = $this->offerRepository->findById($id);
            $input = array_diff_key($attributes, array_flip(["home_image_upload", "home_image_choice"]));
            $this->offerRepository->update($model, $input);
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
     * @param Model $offer
     * @param $attributes
     */
    public function syncRelation(Model $offer, $attributes)
    {
        // sync image
        $this->imageService->syncImage($offer, $attributes);
    }
}