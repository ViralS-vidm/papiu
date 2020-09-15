<?php


namespace Modules\FrontPage\Entities\Traits\Relationship;

use Modules\FrontPage\Entities\Overview;

trait HasOverview
{
    /**
     * A model may have multiple images.
     */

    public function overview()
    {
        return $this->morphToMany(Overview::class, 'model', 'model_has_overview', 'model_id', 'overview_id');
    }
}