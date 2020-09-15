<?php


namespace Modules\Cms\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Cms\Entities\VideoCms;
use Modules\Cms\Repositories\Contracts\VideoCmsRepositoryInterface;
use Modules\Cms\Services\Contracts\VideoCmsServiceInterface;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Image\Entities\Image;
use Modules\Image\Repositories\Contracts\ImageRepositoryInterface;
use Modules\Image\Services\Contracts\ImageServiceInterface;

class VideoCmsService implements VideoCmsServiceInterface
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
     * @var VideoCmsRepositoryInterface
     */
    private $videoCmsRepository;

    /**
     * FeedbackRepository constructor.
     * @param ImageServiceInterface $imageService
     * @param ImageRepositoryInterface $imageRepository
     * @param VideoCmsRepositoryInterface $videoCmsRepository
     */
    public function __construct(ImageServiceInterface $imageService,
                                ImageRepositoryInterface $imageRepository,
                                VideoCmsRepositoryInterface $videoCmsRepository
    )
    {
        $this->imageService = $imageService;
        $this->imageRepository = $imageRepository;
        $this->videoCmsRepository = $videoCmsRepository;
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
        $videoCms = $this->videoCmsRepository->create($attributes);
        $this->syncRelation($videoCms, $attributes);

        DB::commit();

        return $videoCms;
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
            $model = $this->videoCmsRepository->findById($id);
            $this->videoCmsRepository->update($model, $attributes);
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
     * @param Model $videoCms
     * @param $attributes
     */
    public function syncRelation(Model $videoCms, $attributes)
    {

        $this->imageRepository->syncImages($videoCms, []);

        // image upload
        if (isset($attributes['image_upload'])) {
            $this->imageService->uploadAndSyncImage($videoCms, $attributes['image_upload'],
                null, null, Image::TYPE_SERVICE_CMS_IMAGE);
        }
        // image choice
        if (isset($attributes['image_choice'])) {
            $this->imageService->attachImages($videoCms, Image::TYPE_SERVICE_CMS_IMAGE, array_filter(explode(',', $attributes['image_choice'])));
        }
    }

    /**
     * @param VideoCms $videoCms
     * @return array
     */
    public function dataForm(VideoCms $videoCms = null)
    {
        $oldValue = [
            'type' => $videoCms->type ?? null,
            'description' => $videoCms->description ?? null,
            'key' => $videoCms->key ?? null,
        ];

        $thumbnails = $this->imageRepository->toArray('id', 'thumbnail_url');
        $optionType = VideoCms::getListVideo();
        $optionArea = VideoCms::getAreaVideo();

        return compact('oldValue', 'thumbnails', 'videoCms', 'optionType', 'optionArea');
    }
}
