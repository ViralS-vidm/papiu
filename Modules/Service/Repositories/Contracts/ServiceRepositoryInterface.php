<?php

namespace Modules\Service\Repositories\Contracts;


use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\Contracts\BaseRepositoryInterface;
use Modules\Service\Entities\Service;

interface ServiceRepositoryInterface extends BaseRepositoryInterface
{
    public function dataSelect(Service $service = null);

    public function attachServices(Model $model, $services = []);

    public function syncServices(Model $model, $images = []);

    public function servicesPublic();
}
