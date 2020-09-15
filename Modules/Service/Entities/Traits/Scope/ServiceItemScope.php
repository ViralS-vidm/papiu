<?php

namespace Modules\Service\Entities\Traits\Scope;

use App\Models\Traits\Filterable\TranslationNameFilterable;
use Modules\Service\Entities\Traits\Filterable\SearchFilterable;
use Modules\Service\Entities\Traits\Filterable\ServiceItemBelongToRoomFilterable;

trait ServiceItemScope
{
    use TranslationNameFilterable, SearchFilterable, ServiceItemBelongToRoomFilterable;
}
