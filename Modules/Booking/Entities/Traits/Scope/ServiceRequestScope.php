<?php

namespace Modules\Booking\Entities\Traits\Scope;

use Modules\Booking\Entities\Traits\Filterable\ContactEmailFilterable;
use Modules\Booking\Entities\Traits\Filterable\ContactNameFilterable;
use Modules\Booking\Entities\Traits\Filterable\ContactNumberFilterable;
use Modules\Booking\Entities\Traits\Filterable\ServiceFilterable;
use Modules\Booking\Entities\Traits\Filterable\ServiceRequestSearchFilterable;

trait ServiceRequestScope
{
    use ContactEmailFilterable, ContactNumberFilterable, ContactNameFilterable, ServiceRequestSearchFilterable, ServiceFilterable;
}
