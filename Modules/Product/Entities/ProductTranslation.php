<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    protected $fillable = ['name', 'home_intro', 'cate_intro', 'detail_overview', 'detail_brief', 'order_title'];
}
