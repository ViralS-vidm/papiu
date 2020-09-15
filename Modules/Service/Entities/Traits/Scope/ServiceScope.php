<?php

namespace Modules\Service\Entities\Traits\Scope;

use App\Models\Traits\Filterable\TranslationNameFilterable;
use Modules\Service\Entities\Traits\Filterable\SearchFilterable;
use Modules\Service\Entities\Traits\Filterable\ServicePublishFilterable;

trait ServiceScope
{
    use TranslationNameFilterable, SearchFilterable, ServicePublishFilterable;
}
