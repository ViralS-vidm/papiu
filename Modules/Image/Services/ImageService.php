<?php


namespace Modules\Image\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Modules\Image\Entities\Image as ImageEntity;
use Modules\Image\Repositories\Contracts\ImageRepositoryInterface;
use Modules\Image\Services\Contracts\ImageServiceInterface;


class ImageService implements ImageServiceInterface
{

    const DEFAULT_TIME_NAME_FORMAT = 'Y-m-d-h-i-s';

    /**
     * @var ImageRepositoryInterface
     */
    private $imageRepository;

    public function __construct(ImageRepositoryInterface $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    /**
     * @param Model $model
     * @param array $images
     * @param null $folderSave
     * @param null $filename
     * @param null $imageType
     * @return
     */
    public function uploadAndSyncImage(Model $model, $images = [], $folderSave = null, $filename = null, $imageType = null)
    {
        $data = [];

        foreach ($images as $image) {
            $imgData = $this->saveImage($image, $folderSave, $filename);
            $imgData['image_type'] = $imageType;
            $data[] = $imgData;
        }

        return $this->imageRepository->addImages($model, $data);
    }

    /**
     * @param $value
     * @param null $folderSave
     * @param null $filename
     * @return mixed
     */
    public function saveImage($value, $folderSave = null, $filename = null)
    {
        $folderSave = $folderSave ?? config('image.default_save_folder');
        $filename = $filename ?? date(self::DEFAULT_TIME_NAME_FORMAT) . Str::random(10) . '.png';
        $fullPath = $folderSave . $filename;
        $thumbnailPath = config('image.default_thumbnail_folder') . $filename;

        $image = Image::make($value->path());

        Storage::disk(config('image.default_disk'))->put($fullPath, $image->stream());

        $thumbnail = $image->resize(null, 100, function ($constraint) {
            $constraint->aspectRatio();
        });
        Storage::disk(config('image.default_disk'))->put($thumbnailPath, $thumbnail->stream());

        return [
            'original_url' => str_replace('public', 'storage', $fullPath),
            'thumbnail_url' => str_replace('public', 'storage', $thumbnailPath),
        ];
    }

    /**
     * @param Model $model
     * @param $imageType
     * @param array $imageIds
     */
    public function attachImages(Model $model, $imageType, $imageIds = [])
    {
        $data = [];
        foreach ($imageIds as $id) {
            $data[$id] = ['image_type' => $imageType];
        }
        $this->imageRepository->attachImages($model, $data);
    }

    /**
     * @param Model $model
     * @param $attributes
     */
    public function syncImage(Model $model, $attributes)
    {
        $this->imageRepository->syncImages($model, []);

        // image upload
        if (isset($attributes['home_image_upload'])) {
            $this->uploadAndSyncImage($model, $attributes['home_image_upload'],
                null, null, \Modules\Image\Entities\Image::TYPE_HOME_IMAGE);
        }

        if (isset($attributes['detail_image_upload'])) {
            $this->uploadAndSyncImage($model, $attributes['detail_image_upload'],
                null, null, ImageEntity::TYPE_DETAIL_IMAGE);
        }

        // image choice
        if (isset($attributes['home_image_choice'])) {
            $this->attachImages($model, ImageEntity::TYPE_HOME_IMAGE, array_filter(explode(',', $attributes['home_image_choice'])));
        }

        if (isset($attributes['detail_image_choice'])) {
            $this->attachImages($model, ImageEntity::TYPE_DETAIL_IMAGE, array_filter(explode(',', $attributes['detail_image_choice'])));
        }
    }
}
