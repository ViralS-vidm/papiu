<?php

namespace Modules\Booking\Entities\Traits\Relationship;

use Modules\Service\Entities\Offer;

trait OfferRequestRelationship
{
    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
