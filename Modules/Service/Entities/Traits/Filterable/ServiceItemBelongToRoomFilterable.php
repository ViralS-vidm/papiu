<?php

namespace Modules\Service\Entities\Traits\Filterable;

trait ServiceItemBelongToRoomFilterable
{
    public function scopeBelongsToRoom($query)
    {
        return $query->has('services.product');
    }
}
