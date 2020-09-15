<?php

namespace Modules\Booking\Entities\Traits\Filterable;

use Modules\Booking\Entities\Booking;

trait BookingIncompletedFilterable
{
    public function scopeIncomplete($query)
    {
        return $query->where('status', '!=', Booking::STATUS_CHECKED_COMPLETED);
    }
}
