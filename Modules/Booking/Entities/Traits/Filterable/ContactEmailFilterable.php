<?php

namespace Modules\Booking\Entities\Traits\Filterable;

trait ContactEmailFilterable
{
    public function scopeContactEmail($query, $email)
    {
        return $query->where('contact_email', $email);
    }
}
