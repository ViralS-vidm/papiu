<?php

namespace Modules\Booking\Entities\Traits\Scope;

use Modules\Booking\Entities\Traits\Filterable\ContactEmailFilterable;
use Modules\Booking\Entities\Traits\Filterable\ContactNameFilterable;
use Modules\Booking\Entities\Traits\Filterable\ContactNumberFilterable;
use Modules\Booking\Entities\Traits\Filterable\OfferFilterable;
use Modules\Booking\Entities\Traits\Filterable\OfferRequestSearchFilterable;

trait OfferRequestScope
{
    use ContactEmailFilterable, ContactNumberFilterable, ContactNameFilterable, OfferRequestSearchFilterable, OfferFilterable;
}
