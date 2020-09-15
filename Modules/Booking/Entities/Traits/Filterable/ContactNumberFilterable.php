<?php

namespace Modules\Booking\Entities\Traits\Filterable;

trait ContactNumberFilterable
{
    public function scopeContactNumber($query, $number)
    {
        return $query->where('contact_number', $number);
    }
}
