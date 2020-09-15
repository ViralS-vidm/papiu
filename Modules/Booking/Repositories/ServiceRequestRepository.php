<?php

namespace Modules\Booking\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Booking\Entities\ServiceRequest;
use Modules\Booking\Repositories\Contracts\ServiceRequestRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;

class ServiceRequestRepository extends BaseRepository implements ServiceRequestRepositoryInterface
{
    /**
     * FeedbackRepository constructor.
     * @param ServiceRequest $serviceRequest
     */
    public function __construct(ServiceRequest $serviceRequest)
    {
        $this->model = $serviceRequest;
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
