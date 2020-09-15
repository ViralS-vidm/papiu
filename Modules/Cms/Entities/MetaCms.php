<?php

namespace Modules\Cms\Entities;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class MetaCms extends Model implements TranslatableContract
{
    use Translatable;
    //key
    const KEY_BOOK = 'book';
    const KEY_INDEX = 'index';
    const KEY_INTRODUCTION = 'introduction';
    const KEY_PRODUCT = 'product';
    const KEY_SERVICE = 'service';
    const KEY_GALLERY = 'gallery';
    const KEY_OFFER = 'offer';
    const KEY_POLICY = 'policy';
    const KEY_CONTACT = 'contact';
    const KEY_AGENCY = 'agency';
    const KEY_CONDITION = 'condition';

    protected $fillable = [ 'key' ];
    public $translatedAttributes = [ 'description', 'title', 'tag', 'key_word' ];

}
