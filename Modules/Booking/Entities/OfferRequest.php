<?php

namespace Modules\Booking\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Booking\Entities\Traits\Attributes\OfferRequestAttribute;
use Modules\Booking\Entities\Traits\Methods\OfferRequestMethod;
use Modules\Booking\Entities\Traits\Relationship\OfferRequestRelationship;
use Modules\Booking\Entities\Traits\Scope\OfferRequestScope;

class OfferRequest extends Model
{
    use OfferRequestScope, OfferRequestRelationship, OfferRequestMethod, OfferRequestAttribute;

    const STATUS_NEW = 0;
    const STATUS_COMPLETED = 1;

    protected $fillable = ['offer_id', 'contact_name', 'contact_email', 'contact_number', 'address'];
}
