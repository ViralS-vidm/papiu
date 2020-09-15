<?php


namespace Modules\Booking\Entities\Traits\Filterable;


use Illuminate\Database\Eloquent\Builder;

trait ShortCodeFilterable
{
    /**
     * Scope a query to only include records have name that contains $name.
     *
     * @param Builder $query
     * @param $code
     * @return Builder
     */
    public function scopeShortCode($query, $code)
    {
        return $query->where('short_code', 'LIKE', "%{$code}%");
    }
}