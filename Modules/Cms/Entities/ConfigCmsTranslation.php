<?php

namespace Modules\Cms\Entities;

use Illuminate\Database\Eloquent\Model;

class ConfigCmsTranslation extends Model
{
    protected $table = 'config_cms_translations';
    protected $fillable = [ 'value', 'title', 'area'];
}
