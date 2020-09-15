<?php


namespace Modules\Cms\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Cms\Entities\ImageCms;
use Modules\Cms\Repositories\Contracts\ImageCmsRepositoryInterface;
use Modules\Cms\Services\Contracts\ImageCmsServiceInterface;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Image\Entities\Image;
use Modules\Image\Repositories\Contracts\ImageRepositoryInterface;
use Modules\Image\Services\Contracts\ImageServiceInterface;

class ImageCmsService implements ImageCmsServiceInterface
{
    /**
     * @var ImageRepositoryInterface
     */
    private $imageService;
    /**
     * @var ImageRepositoryInterface
     */
    private $imageRepository;
    /**
     * @var ImageCmsRepositoryInterface
     */
    private $imageCmsRepository;

    /**
     * FeedbackRepository constructor.
     * @param ImageServiceInterface $imageService
     * @param ImageRepositoryInterface $imageRepository
     * @param ImageCmsRepositoryInterface $imageCmsRepository
     */
    public function __construct(ImageServiceInterface $imageService,
                                ImageRepositoryInterface $imageRepository,
                                ImageCmsRepositoryInterface $imageCmsRepository
    )
    {
        $this->imageService = $imageService;
        $this->imageRepository = $imageRepository;
        $this->imageCmsRepository = $imageCmsRepository;
    }

    /**
     * @param array $attributes
     * @return Model | bool
     * @throws RepositoryException
     */
    public function create(array $attributes)
    {
        DB::beginTransaction();

//        try {
        $imageCms = $this->imageCmsRepository->create($attributes);
        $this->syncRelation($imageCms, $attributes);

        DB::commit();

        return $imageCms;
//        } catch (\Exception $e) {
//            DB::rollback();
//            logger([$e->getFile(), $e->getLine(), $e->getMessage()]);
//            throw RepositoryException::createFailed();
//        }

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
            $model = $this->imageCmsRepository->findById($id);
            $this->imageCmsRepository->update($model, $attributes);
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
     * @param Model $imageCms
     * @param $attributes
     */
    public function syncRelation(Model $imageCms, $attributes)
    {

        $this->imageRepository->syncImages($imageCms, []);

        // image upload
        if (isset($attributes['image_upload'])) {
            $this->imageService->uploadAndSyncImage($imageCms, $attributes['image_upload'],
                null, null, Image::TYPE_SERVICE_CMS_IMAGE);
        }
        // image choice
        if (isset($attributes['image_choice'])) {
            $this->imageService->attachImages($imageCms, Image::TYPE_SERVICE_CMS_IMAGE, array_filter(explode(',', $attributes['image_choice'])));
        }
    }

    /**
     * @param ImageCms $imageCms
     * @return array
     */
    public function dataForm(ImageCms $imageCms = null)
    {
        $oldValue = [
            'home_image' => [],
            'type' => $imageCms->type ?? null,
            'description' => $imageCms->description ?? null,
            'key' => $imageCms->key ?? null,
        ];

        if (!is_null($imageCms)) {
            $oldValue['home_image'] = $imageCms->imageCms->pluck('thumbnail_url', 'id')->toArray();
        }
        $thumbnails = $this->imageRepository->toArray('id', 'thumbnail_url');
        $optionType = ImageCms::getListImage();
        $optionArea = ImageCms::getAreaImage();

        return compact('oldValue', 'thumbnails', 'imageCms', 'optionType', 'optionArea');
    }
}
