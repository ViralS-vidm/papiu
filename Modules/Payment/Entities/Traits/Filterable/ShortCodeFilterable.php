<?php


namespace Modules\Payment\Entities\Traits\Filterable;


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
        return $query->whereHas('booking', function ($q) use ($code) {
            $q->where('short_code', 'LIKE', "%{$code}%");
        });
    }
}