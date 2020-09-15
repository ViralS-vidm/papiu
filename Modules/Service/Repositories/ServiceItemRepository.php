<?php

namespace Modules\Service\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\BaseRepository;
use Modules\Service\Entities\ServiceItem;
use Modules\Service\Repositories\Contracts\ServiceItemRepositoryInterface;

class ServiceItemRepository extends BaseRepository implements ServiceItemRepositoryInterface
{
    /**
     * ServiceRepository constructor.
     * @param ServiceItem $serviceItem
     */
    public function __construct(ServiceItem $serviceItem)
    {
        $this->model = $serviceItem;
    }

    /**
     * @param Model $model
     * @return mixed
     */
    function transformResource(Model $model)
    {
        return $model;
    }
}
