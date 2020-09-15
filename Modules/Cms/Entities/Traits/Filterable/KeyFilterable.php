<?php

namespace Modules\Cms\Entities\Traits\Filterable;

use Illuminate\Database\Eloquent\Builder;

trait KeyFilterable
{
    /**
     * Scope a query to only include records have name that contains $name.
     *
     * @param Builder $query
     * @param $key
     * @return Builder
     */
    public function scopeKey($query, $key)
    {
        return $query->where('key', $key);
    }
}
