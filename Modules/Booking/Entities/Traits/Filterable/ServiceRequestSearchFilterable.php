<?php

namespace Modules\Booking\Entities\Traits\Filterable;

use Illuminate\Database\Eloquent\Builder;

trait ServiceRequestSearchFilterable
{
    public function scopeSearch($query, $keyword)
    {
        return $query->contactName($keyword)->orWhere(function (Builder $query) use ($keyword) {
            $query->contactNumber($keyword);
        })->orWhere(function (Builder $query) use ($keyword) {
            $query->contactEmail($keyword);
        })->orWhere(function (Builder $query) use ($keyword) {
            $query->service($keyword);
        });
    }
}
