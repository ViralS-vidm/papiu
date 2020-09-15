<?php

namespace Modules\Booking\Entities\Traits\Relationship;

use Modules\Service\Entities\Service;

trait ServiceRequestRelationship
{
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
