<?php

namespace Modules\Cms\Entities\Traits\Scope;

use App\Models\Traits\Filterable\NameFilterable;
use Modules\Cms\Entities\Traits\Filterable\KeyFilterable;
use Modules\Cms\Entities\Traits\Filterable\SearchFilterable;
use Modules\Cms\Entities\Traits\Filterable\TypeFilterable;

trait ConfigCmsScope
{
    use SearchFilterable, NameFilterable, KeyFilterable, TypeFilterable;
}
