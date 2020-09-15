<?php

namespace Modules\Cms\Entities;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Modules\Cms\Entities\Traits\Relationship\ImageCmsRelationship;
use Modules\Cms\Entities\Traits\Scope\ImageCmsScope;

class ImageCmsTranslation extends Model
{
    protected $table = 'image_cms_translations';
    protected $fillable = ['description', 'alt', 'title', 'name', 'hash_tag', 'key_word', 'header', 'area'];
}
