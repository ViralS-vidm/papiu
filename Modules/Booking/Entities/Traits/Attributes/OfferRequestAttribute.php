<?php

namespace Modules\Booking\Entities\Traits\Attributes;

use Modules\Booking\Entities\OfferRequest;

trait OfferRequestAttribute
{
    public function getStatusNameAttribute()
    {
        return OfferRequest::statusName()[ $this->is_completed ];
    }
}
