<?php

namespace Modules\Service\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Repositories\BaseRepository;
use Modules\Image\Entities\Image;
use Modules\Image\Repositories\Contracts\ImageRepositoryInterface;
use Modules\Image\Services\Contracts\ImageServiceInterface;
use Modules\Service\Entities\Service;
use Modules\Service\Repositories\Contracts\ServiceItemRepositoryInterface;
use Modules\Service\Repositories\Contracts\ServiceRepositoryInterface;

class ServiceRepository extends BaseRepository implements ServiceRepositoryInterface
{
    /**
     * @var ServiceItemRepositoryInterface
     */
    private $serviceItemRepository;
    /**
     * @var ImageRepositoryInterface
     */
    private $imageRepository;
    /**
     * @var ImageServiceInterface
     */
    private $imageService;

    /**
     * ServiceRepository constructor.
     * @param Service $service
     * @param ServiceItemRepositoryInterface $serviceItemRepository
     * @param ImageRepositoryInterface $imageRepository
     * @param ImageServiceInterface $imageService
     */
    public function __construct(
        Service $service,
        ServiceItemRepositoryInterface $serviceItemRepository,
        ImageRepositoryInterface $imageRepository,
        ImageServiceInterface $imageService)
    {
        $this->model = $service;
        $this->serviceItemRepository = $serviceItemRepository;
        $this->imageRepository = $imageRepository;
        $this->imageService = $imageService;
    }

    /**
     * @param Service|null $service
     * @return array
     */
    public function dataSelect(Service $service = null)
    {
        $oldValue = [
            'serviceItems' => [],
            'home_image'   => [],
        ];

        if ( ! is_null($service)) {
            $oldValue['serviceItems'] = $service->serviceItems->pluck('id')->toArray();
            $oldValue['home_image'] = $service->homeImage->pluck('thumbnail_url', 'id')->toArray();
        }

        $serviceItems = $this->serviceItemRepository->toArray('id', 'name');
        $thumbnails = $this->imageRepository->toArray('id', 'thumbnail_url');

        return compact('oldValue', 'serviceItems', 'thumbnails');
    }

    /**
     * @param Model $service
     * @param $attributes
     */
    private function syncRelation(Model $service, $attributes)
    {
        // update convenience
        $service->serviceItems()->sync($attributes['serviceItems']);

        $this->imageRepository->syncImages($service, []);

        // image upload
        if (isset($attributes['home_image_upload'])) {
            $this->imageService->uploadAndSyncImage($service, $attributes['home_image_upload'],
                null, null, Image::TYPE_HOME_IMAGE);
        }

        // image choice
        if (isset($attributes['home_image_choice'])) {
            $this->imageService->attachImages($service, Image::TYPE_HOME_IMAGE, array_filter(explode(',', $attributes['home_image_choice'])));
        }

    }

    /**
     * @param array $attributes
     * @return Model | bool
     * @throws RepositoryException
     */
    public function create(array $attributes): Model
    {
        DB::beginTransaction();
        try {
            $service = $this->model->create($attributes);
            $this->syncRelation($service, $attributes);

            DB::commit();

            return $service;
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
    public function updateById($id, array $attributes): Model
    {
        DB::beginTransaction();

        try {
            $model = $this->findById($id);
            $this->update($model, $attributes);
            $this->syncRelation($model, $attributes);

            DB::commit();

            return $model;
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            logger([$e->getFile(), $e->getLine(), $e->getMessage()]);
            throw RepositoryException::updateFailed();
        }
    }

    /**
     *
     * add image url and add relationship image
     *
     * @param Model $model
     * @param array $images
     * @return bool
     */
    public function syncServices(Model $model, $images = [])
    {
        return $model->services()->sync($images);
    }

    /**
     *
     * add image url and add relationship image
     *
     * @param Model $model
     * @param array $services
     * @return bool
     */
    public function attachServices(Model $model, $services = [])
    {
        return $model->services()->attach($services);
    }

    /**
     * @param Model $model
     * @return mixed
     */
    function transformResource(Model $model)
    {
        return $model;
    }

    /**
     * @inheritDoc
     */
    public function servicesPublic()
    {
        $notIncludes = [
            5, // dịch vụ cưới
            6, // gói trăng mật
            7, // quà tặng người thân
        ];

        return $this->model->publish()->whereNotIn('id', $notIncludes)->orderBy('id', 'desc')->get();
    }
}
