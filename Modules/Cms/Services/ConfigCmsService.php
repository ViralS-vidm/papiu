<?php


namespace Modules\Cms\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Cms\Entities\ConfigCms;
use Modules\Cms\Repositories\Contracts\ConfigCmsRepositoryInterface;
use Modules\Cms\Services\Contracts\ConfigCmsServiceInterface;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Image\Entities\Image;
use Modules\Image\Repositories\Contracts\ImageRepositoryInterface;
use Modules\Image\Services\Contracts\ImageServiceInterface;

class ConfigCmsService implements ConfigCmsServiceInterface
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
     * @var ConfigCmsRepositoryInterface
     */
    private $configCmsRepository;

    /**
     * FeedbackRepository constructor.
     * @param ImageServiceInterface $imageService
     * @param ImageRepositoryInterface $imageRepository
     * @param ConfigCmsRepositoryInterface $configCmsRepository
     */
    public function __construct(ImageServiceInterface $imageService,
                                ImageRepositoryInterface $imageRepository,
                                ConfigCmsRepositoryInterface $configCmsRepository
    )
    {
        $this->imageService = $imageService;
        $this->imageRepository = $imageRepository;
        $this->configCmsRepository = $configCmsRepository;
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
            $configCms = $this->configCmsRepository->create($attributes);
            $this->syncRelation($configCms, $attributes);

            DB::commit();

            return $configCms;
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
            $model = $this->configCmsRepository->findById($id);
            $this->configCmsRepository->update($model, $attributes);
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
     * @param Model $configCms
     * @param $attributes
     */
    public function syncRelation(Model $configCms, $attributes)
    {

        $this->imageRepository->syncImages($configCms, []);

        // image upload
        if (isset($attributes['image_upload'])) {
            $this->imageService->uploadAndSyncImage($configCms, $attributes['image_upload'],
                null, null, Image::TYPE_CONFIG_CMS_IMAGE);
        }
        // image choice
        if (isset($attributes['image_choice'])) {
            $this->imageService->attachImages($configCms, Image::TYPE_CONFIG_CMS_IMAGE, array_filter(explode(',', $attributes['image_choice'])));
        }
    }

    /**
     * @param ConfigCms $configCms
     * @return array
     */
    public function dataForm(ConfigCms $configCms = null)
    {
        $oldValue = [
            'home_image' => [],
            'key' => $configCms->key ?? null,
            'type' => $configCms->type ?? null,
            'status' => $configCms->status ?? ConfigCms::STATUS_ENABLE
        ];

        if (!is_null($configCms)) {
            $oldValue['home_image'] = $configCms->imageCms->pluck('thumbnail_url', 'id')->toArray();
        }
        $thumbnails = $this->imageRepository->toArray('id', 'thumbnail_url');
        $optionStatus = ConfigCms::getSelectedStatus();


        return compact('oldValue', 'thumbnails', 'configCms', 'optionStatus');
    }
}
