<?php

namespace Modules\Product\Entities;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ProductConvenience extends Model implements TranslatableContract
{
    use Translatable;

    protected $table = 'product_conveniences';
    protected $fillable = ['icon'];

    public $translatedAttributes = ['name'];
}
