<?php

namespace Modules\Booking\Entities\Traits\Filterable;

use Illuminate\Database\Eloquent\Builder;

trait ServicesFilterable
{
    public function scopeServices($query, $name)
    {
        return $query->whereHas('services', function (Builder $query) use ($name) {
            $query->whereTranslationLike('name', "%{$name}%");
        });
    }
}
