<?php

namespace Modules\Image\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Repositories\BaseRepository;
use Modules\Image\Entities\Image;
use Modules\Image\Repositories\Contracts\ImageRepositoryInterface;

class ImageRepository extends BaseRepository implements ImageRepositoryInterface
{
    /**
     * FeedbackRepository constructor.
     * @param Image $image
     */
    public function __construct(Image $image)
    {
        $this->model = $image;
    }

    /**
     * created image
     * $params: string or array
     *
     * return: all images for record
     * @param Model $model
     * @param array $attributes
     * @return bool
     * @throws RepositoryException
     * @throws RepositoryException
     */
    public function addImages(Model $model, $attributes = [])
    {
        $imageArr = [];
        foreach ($attributes as $data) {
            $image = $this->create($data);
            $imageArr[$image->id] = ['image_type' => $data['image_type']];
        }
        return $this->attachImages($model, $imageArr);
    }

    /**
     *
     * add image url and add relationship image
     *
     * @param Model $model
     * @param array $images
     * @return bool
     */
    public function syncImages(Model $model, $images = [])
    {
        return $model->images()->sync($images);
    }

    /**
     *
     * add image url and add relationship image
     *
     * @param Model $model
     * @param array $images
     * @return bool
     */
    public function attachImages(Model $model, $images = [])
    {
        return $model->images()->attach($images);
    }

    /**
     * deleted image
     * $params: string or array
     *
     * return: true or false
     * @param Model $model
     * @param array $images
     * @return bool
     */
    public function deleteImages(Model $model, $images = [])
    {
        $modelImages = $model->images()->pluck('id')->toArray();
        return $this->syncImages($model, array_diff($modelImages, $images));
    }

    /**
     * @param Model $model
     * @return mixed
     */
    function transformResource(Model $model)
    {
        return $model;
    }
}
