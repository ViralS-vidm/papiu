<?php

namespace Modules\Booking\Entities\Traits\Attributes;

use Modules\Booking\Entities\Booking;

trait BookingAttribute
{
    public function getRemainAttribute()
    {
        return $this->total_price - $this->paid;
    }

    public function getStatusNameAttribute()
    {
        return Booking::statusName()[ $this->status ];
    }
}
