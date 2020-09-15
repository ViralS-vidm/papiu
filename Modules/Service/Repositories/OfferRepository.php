<?php

namespace Modules\Service\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\BaseRepository;
use Modules\Service\Entities\Offer;
use Modules\Service\Repositories\Contracts\OfferRepositoryInterface;

class OfferRepository extends BaseRepository implements OfferRepositoryInterface
{

    /**
     * OfferRepository constructor.
     * @param Offer $offer
     */
    public function __construct(Offer $offer)
    {
        $this->model = $offer;
        $this->relations = ['homeImage'];
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
