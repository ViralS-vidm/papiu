<?php

namespace Modules\Service\Entities\Traits\Filterable;

trait ServicePublishFilterable
{
    public function scopePublish($query)
    {
        return $query->whereNull('product_id');
    }
}
