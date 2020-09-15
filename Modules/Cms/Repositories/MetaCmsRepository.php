<?php

namespace Modules\Cms\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Cms\Repositories\Contracts\MetaCmsRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;
use Modules\Cms\Entities\MetaCms;

class MetaCmsRepository extends BaseRepository implements MetaCmsRepositoryInterface
{
    /**
     * FeedbackRepository constructor.
     * @param MetaCms $meta
     */
    public function __construct(MetaCms $meta)
    {
        $this->model = $meta;
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
