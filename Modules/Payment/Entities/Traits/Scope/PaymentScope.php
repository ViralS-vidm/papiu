<?php

namespace Modules\Payment\Entities\Traits\Scope;

use Modules\Payment\Entities\Traits\Filterable\SearchFilterable;
use Modules\Payment\Entities\Traits\Filterable\ShortCodeFilterable;

trait PaymentScope
{
    use SearchFilterable, ShortCodeFilterable;
}
