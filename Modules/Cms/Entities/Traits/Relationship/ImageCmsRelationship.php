<?php


namespace Modules\Cms\Entities\Traits\Relationship;


use Modules\FrontPage\Entities\Traits\Relationship\HasOverview;
use Modules\Image\Entities\Traits\Relationship\HasImages;

trait ImageCmsRelationship
{
    use HasImages, HasOverview;

    /**
     * @return mixed
     */
}
