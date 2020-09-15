<?php

namespace Modules\Booking\Entities\Traits\Filterable;

use Illuminate\Database\Eloquent\Builder;

trait ProductFilterable
{
    public function scopeProduct($query, $name)
    {
        return $query->whereHas('product', function (Builder $query) use ($name) {
            $query->whereTranslationLike('name', "%{$name}%");
        });
    }
}
