<?php

namespace Modules\Cms\Entities;

use Illuminate\Database\Eloquent\Model;

class VideoCmsTranslation extends Model
{
    protected $table = 'video_cms_translations';
    protected $fillable = ['title', 'description', 'name'];
}
