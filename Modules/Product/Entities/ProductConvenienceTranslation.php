<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductConvenienceTranslation extends Model
{
    protected $table = 'product_convenience_translations';
    protected $fillable = ['name'];
}
