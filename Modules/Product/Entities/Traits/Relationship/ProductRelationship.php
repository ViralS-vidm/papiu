<?php


namespace Modules\Product\Entities\Traits\Relationship;


use Modules\FrontPage\Entities\Traits\Relationship\HasOverview;
use Modules\Image\Entities\Traits\Relationship\HasImages;
use Modules\Product\Entities\ProductConvenience;
use Modules\Service\Entities\Service;

trait ProductRelationship
{
    use HasImages, HasOverview;

    /**
     * @return mixed
     */
    public function conveniences()
    {
        return $this->belongsToMany(ProductConvenience::class, 'product_conveniences_pivot', 'product_id', 'convenience_id');
    }

    public function service()
    {
        return $this->hasOne(Service::class);
    }
}
