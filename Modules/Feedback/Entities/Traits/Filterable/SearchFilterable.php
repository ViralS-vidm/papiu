<?php

namespace Modules\Feedback\Entities\Traits\Filterable;

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
        return $query->name($keyword)->orWhere(function (Builder $query) use ($keyword) {
            $query->email($keyword);
        });
    }
}
