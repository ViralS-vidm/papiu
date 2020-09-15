<?php

namespace Modules\Booking\Entities\Traits\Scope;

use Modules\Booking\Entities\Traits\Filterable\BookingIncompletedFilterable;
use Modules\Booking\Entities\Traits\Filterable\ContactEmailFilterable;
use Modules\Booking\Entities\Traits\Filterable\ContactNameFilterable;
use Modules\Booking\Entities\Traits\Filterable\ContactNumberFilterable;
use Modules\Booking\Entities\Traits\Filterable\ProductFilterable;
use Modules\Booking\Entities\Traits\Filterable\SearchFilterable;
use Modules\Booking\Entities\Traits\Filterable\ServicesFilterable;
use Modules\Booking\Entities\Traits\Filterable\ShortCodeFilterable;
use Modules\Booking\Entities\Traits\Filterable\StatusFilterable;
use Modules\Booking\Entities\Traits\Filterable\TimeStartFilterable;

trait BookingScope
{
    use SearchFilterable,
        ShortCodeFilterable,
        ContactNameFilterable,
        ContactNumberFilterable,
        ContactEmailFilterable,
        BookingIncompletedFilterable,
        ProductFilterable,
        ServicesFilterable,
        StatusFilterable,
        TimeStartFilterable;
}
