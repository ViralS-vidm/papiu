<?php

namespace Modules\Booking\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Booking\Entities\Traits\Attributes\ServiceRequestAttribute;
use Modules\Booking\Entities\Traits\Methods\ServiceRequestMethod;
use Modules\Booking\Entities\Traits\Relationship\ServiceRequestRelationship;
use Modules\Booking\Entities\Traits\Scope\ServiceRequestScope;

class ServiceRequest extends Model
{
    use ServiceRequestScope, ServiceRequestRelationship, ServiceRequestMethod, ServiceRequestAttribute;

    const STATUS_NEW = 0;
    const STATUS_COMPLETED = 1;

    protected $fillable = ['service_id', 'contact_name', 'contact_email', 'contact_number', 'address'];

}
