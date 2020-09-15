<?php

namespace Modules\Agency\Entities\Traits\Scope;

use App\Models\Traits\Filterable\EmailFilterable;
use App\Models\Traits\Filterable\NameFilterable;
use Modules\Feedback\Entities\Traits\Filterable\SearchFilterable;

trait AgencyScope
{
    use SearchFilterable, NameFilterable, EmailFilterable;
}
