<?php

namespace Modules\Cms\Entities\Traits\Scope;

use Modules\Cms\Entities\Traits\Filterable\SearchFilterable;

trait ImageCmsScope
{
    use SearchFilterable;

    public function scopeSearch($query, $keyword)
    {
        return $query->where('alt', 'LIKE', "%{$keyword}%");
    }
}
