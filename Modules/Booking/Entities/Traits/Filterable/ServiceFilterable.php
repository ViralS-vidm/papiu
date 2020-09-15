<?php

namespace Modules\Booking\Entities\Traits\Filterable;

use Illuminate\Database\Eloquent\Builder;

trait ServiceFilterable
{
    public function scopeService($query, $name)
    {
        return $query->whereHas('service', function (Builder $query) use ($name) {
            $query->whereTranslationLike('name', "%{$name}%");
        });
    }
}
