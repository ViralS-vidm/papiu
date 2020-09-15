<?php

namespace Modules\Product\Entities\Traits\Scope;

use App\Models\Traits\Filterable\TranslationNameFilterable;
use Modules\Product\Entities\Traits\Filterable\SearchFilterable;

trait ProductScope
{
    use SearchFilterable, TranslationNameFilterable;
}
