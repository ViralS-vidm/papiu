<?php

namespace Modules\Service\Entities\Traits\Relationship;

use Modules\Service\Entities\Service;

trait ServiceItemRelationship
{
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
