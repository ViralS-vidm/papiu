<?php


namespace Modules\Image\Entities\Traits\Relationship;

use Modules\Image\Entities\Image;

trait HasImages
{
    /**
     * A model may have multiple images.
     */

    public function images()
    {
        return $this->morphToMany(Image::class, 'model', 'model_has_images', 'model_id', 'image_id');
    }

    /**
     * @return mixed
     */
    public function homeImage()
    {
        return $this
            ->morphToMany(Image::class, 'model', 'model_has_images', 'model_id', 'image_id')
            ->wherePivot('image_type', Image::TYPE_HOME_IMAGE);
    }

    /**
     * @return mixed
     */
    public function detailImages()
    {
        return $this
            ->morphToMany(Image::class, 'model', 'model_has_images', 'model_id', 'image_id')
            ->wherePivot('image_type', Image::TYPE_DETAIL_IMAGE);
    }

    /**
     * @return mixed
     */
    public function userExperienceImages()
    {
        return $this
            ->morphToMany(Image::class, 'model', 'model_has_images', 'model_id', 'image_id')
            ->wherePivot('image_type', Image::TYPE_USER_EXPERIENCE_IMAGE);
    }

    /**
     * @return mixed
     */
    public function imageCms()
    {
        return $this
            ->morphToMany(Image::class, 'model', 'model_has_images', 'model_id', 'image_id')
            ->wherePivot('image_type', Image::TYPE_SERVICE_CMS_IMAGE);
    }
    /**
     * @return mixed
     */
    public function imageHashTagCms()
    {
        return $this
            ->morphToMany(Image::class, 'model', 'model_has_images', 'model_id', 'image_id')
            ->wherePivot('image_type', Image::TYPE_HASH_TAG_CMS_IMAGE);
    }
}
