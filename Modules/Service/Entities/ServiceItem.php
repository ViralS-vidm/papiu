<?php

namespace Modules\Service\Entities;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Service\Entities\Traits\Relationship\ServiceItemRelationship;
use Modules\Service\Entities\Traits\Scope\ServiceItemScope;

class ServiceItem extends Model implements TranslatableContract
{
    use ServiceItemRelationship, ServiceItemScope, Translatable;

    protected $table = 'service_items';
    protected $fillable = [];
    public $translatedAttributes = ['name'];
}
