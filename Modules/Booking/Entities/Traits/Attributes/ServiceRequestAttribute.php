<?php

namespace Modules\Booking\Entities\Traits\Attributes;

use Modules\Booking\Entities\ServiceRequest;

trait ServiceRequestAttribute
{
    public function getStatusNameAttribute()
    {
        return ServiceRequest::statusName()[ $this->is_completed ];
    }
}
