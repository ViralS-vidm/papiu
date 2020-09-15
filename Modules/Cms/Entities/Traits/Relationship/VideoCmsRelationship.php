<?php


namespace Modules\Cms\Entities\Traits\Relationship;


use Modules\FrontPage\Entities\Traits\Relationship\HasOverview;
use Modules\Image\Entities\Traits\Relationship\HasImages;

trait VideoCmsRelationship
{
    use HasImages, HasOverview;

    /**
     * @return mixed
     */
}
