<?php

namespace Modules\Booking\Entities\Traits\Filterable;

trait ContactNameFilterable
{
    public function scopeContactName($query, $name)
    {
        return $query->where('contact_name', 'LIKE', "%{$name}%");
    }
}
