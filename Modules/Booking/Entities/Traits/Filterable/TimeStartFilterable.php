<?php

namespace Modules\Booking\Entities\Traits\Filterable;

trait TimeStartFilterable
{
    public function scopeTimeStart($query, $timeStart)
    {
        return $query->whereBetween('time_start', $timeStart);
    }
}
