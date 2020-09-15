<?php

namespace Modules\Cms\Services\Contracts;

use Illuminate\Database\Eloquent\Model;
use Modules\Cms\Entities\ConfigCms;

interface ConfigCmsServiceInterface
{
    public function create(array $attributes);

    public function updateById($id, array $attributes);

    public function syncRelation(Model $config, $attributes);

    public function dataForm(ConfigCms $config = null);
}
