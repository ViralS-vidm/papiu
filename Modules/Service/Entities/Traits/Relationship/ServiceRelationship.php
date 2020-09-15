<?php

namespace Modules\Service\Entities\Traits\Relationship;

use Modules\Image\Entities\Traits\Relationship\HasImages;
use Modules\Product\Entities\Product;
use Modules\Service\Entities\ServiceItem;

trait ServiceRelationship
{
    use HasImages;

    public function serviceItems()
    {
        return $this->belongsToMany(ServiceItem::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
