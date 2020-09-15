<?php

namespace Modules\Booking\Entities\Traits\Filterable;

trait StatusFilterable
{
    public function scopeStatus($query, $status)
    {
        if ($status == 0) {
            return $query;
        }

        return $query->where('status', $status);
    }
}
