<?php

namespace Modules\Service\Entities;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Service\Entities\Traits\Relationship\OfferRelationship;
use Modules\Service\Entities\Traits\Scope\OfferScope;

class Offer extends Model implements TranslatableContract
{
    use OfferScope, Translatable, OfferRelationship;

    protected $fillable = [];
    public $translatedAttributes = ['name', 'description', 'content'];
}
