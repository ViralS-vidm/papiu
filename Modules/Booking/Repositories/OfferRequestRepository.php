<?php

namespace Modules\Booking\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Booking\Entities\OfferRequest;
use Modules\Booking\Repositories\Contracts\OfferRequestRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;

class OfferRequestRepository extends BaseRepository implements OfferRequestRepositoryInterface
{
    /**
     * FeedbackRepository constructor.
     * @param OfferRequest $offerRequest
     */
    public function __construct(OfferRequest $offerRequest)
    {
        $this->model = $offerRequest;
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
