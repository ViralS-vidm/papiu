<?php

namespace Modules\Service\Entities;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Service\Entities\Traits\Relationship\ServiceRelationship;
use Modules\Service\Entities\Traits\Scope\ServiceScope;

class Service extends Model implements TranslatableContract
{
    use ServiceScope, ServiceRelationship, Translatable;

    protected $table = 'services';
    protected $fillable = ['price'];
    public $translatedAttributes = ['name', 'description', 'price_description', 'detail'];
}
