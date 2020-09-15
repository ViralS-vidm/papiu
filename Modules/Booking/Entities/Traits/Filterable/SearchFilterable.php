<?php

namespace Modules\Booking\Entities\Traits\Filterable;

use Illuminate\Database\Eloquent\Builder;

trait SearchFilterable
{
    /**
     * Scope a query to only include records have name that contains $name.
     *
     * @param Builder $query
     * @param $keyword
     * @return Builder
     */
    public function scopeSearch($query, $keyword)
    {
        return $query->shortCode($keyword)->orWhere(function (Builder $query) use ($keyword) {
            $query->contactName($keyword);
        })->orWhere(function (Builder $query) use ($keyword) {
            $query->contactNumber($keyword);
        })->orWhere(function (Builder $query) use ($keyword) {
            $query->contactEmail($keyword);
        })->orWhere(function (Builder $query) use ($keyword) {
            $query->product($keyword);
        })->orWhere(function (Builder $query) use ($keyword) {
            $query->services($keyword);
        });
    }
}
