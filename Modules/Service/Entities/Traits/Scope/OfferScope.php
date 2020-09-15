<?php

namespace Modules\Service\Entities\Traits\Scope;

use App\Models\Traits\Filterable\TranslationNameFilterable;
use Modules\Service\Entities\Traits\Filterable\SearchFilterable;

trait OfferScope
{
    use SearchFilterable, TranslationNameFilterable;
}
