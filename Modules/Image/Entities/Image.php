<?php

namespace Modules\Image\Entities;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    const TYPE_HOME_IMAGE = 1;
    const TYPE_DETAIL_IMAGE = 2;
    const TYPE_USER_EXPERIENCE_IMAGE = 3;
    const TYPE_SERVICE_CMS_IMAGE = 4;
    const TYPE_CONFIG_CMS_IMAGE = 5;
    const TYPE_HASH_TAG_CMS_IMAGE = 6;

    protected $table = 'images';
    protected $fillable = ['original_url', 'thumbnail_url'];
}
