<?php

namespace Modules\Cms\Entities;

use Illuminate\Database\Eloquent\Model;

class MetaCmsTranslation extends Model
{
    protected $table = 'meta_cms_translations';
    protected $fillable = [ 'description', 'title', 'tag', 'key_word' ];
}
