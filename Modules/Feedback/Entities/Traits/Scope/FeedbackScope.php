<?php

namespace Modules\Feedback\Entities\Traits\Scope;

use App\Models\Traits\Filterable\EmailFilterable;
use App\Models\Traits\Filterable\NameFilterable;
use Modules\Feedback\Entities\Traits\Filterable\SearchFilterable;

trait FeedbackScope
{
    use SearchFilterable, NameFilterable, EmailFilterable;
}
