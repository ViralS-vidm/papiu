<?php

namespace Modules\Booking\Entities\Traits\Filterable;

use Illuminate\Database\Eloquent\Builder;

trait OfferFilterable
{
    public function scopeOffer($query, $name)
    {
        return $query->whereHas('offer', function (Builder $query) use ($name) {
            $query->whereTranslationLike('name', "%{$name}%");
        });
    }
}
