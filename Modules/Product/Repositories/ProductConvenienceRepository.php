<?php

namespace Modules\Product\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\BaseRepository;
use Modules\Product\Entities\ProductConvenience;
use Modules\Product\Repositories\Contracts\ProductConvenienceRepositoryInterface;

class ProductConvenienceRepository extends BaseRepository implements ProductConvenienceRepositoryInterface
{
    /**
     * FeedbackRepository constructor.
     * @param ProductConvenience $convenience
     */
    public function __construct(ProductConvenience $convenience)
    {
        $this->model = $convenience;
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
