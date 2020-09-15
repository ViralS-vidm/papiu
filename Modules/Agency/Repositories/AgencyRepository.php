<?php

namespace Modules\Agency\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Agency\Entities\Agency;
use Modules\Agency\Repositories\Contracts\AgencyRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;

class AgencyRepository extends BaseRepository implements AgencyRepositoryInterface
{
    /**
     * FeedbackRepository constructor.
     * @param Agency $agency
     */
    public function __construct(Agency $agency)
    {
        $this->model = $agency;
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
