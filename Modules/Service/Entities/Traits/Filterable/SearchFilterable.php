<?php

namespace Modules\Service\Entities\Traits\Filterable;

trait SearchFilterable
{
    public function scopeSearch($query, $keyword)
    {
        return $query->name($keyword);
    }
}
