<?php

namespace Modules\Product\Entities;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Product\Entities\Traits\Relationship\ProductRelationship;
use Modules\Product\Entities\Traits\Scope\ProductScope;

class Product extends Model implements TranslatableContract
{
    use ProductScope, ProductRelationship, SoftDeletes, Translatable;

    protected $table = 'products';
    protected $fillable = [
        'price_per_day', 'num_bedroom', 'num_bathroom', 'num_lounge'
    ];
    public $translatedAttributes = ['name', 'home_intro', 'cate_intro', 'detail_overview', 'detail_brief', 'order_title'];
}
