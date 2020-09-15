<?php

namespace Modules\Cms\Repositories\Contracts;

use Modules\Core\Repositories\Contracts\BaseRepositoryInterface;

interface ConfigCmsRepositoryInterface extends BaseRepositoryInterface
{
    public function getAll($filters = [], $sorts = []);
}
