<?php

namespace Modules\Cms\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Cms\Repositories\Contracts\VideoCmsRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;
use Modules\Cms\Entities\VideoCms;

class VideoCmsRepository extends BaseRepository implements VideoCmsRepositoryInterface
{
    /**
     * FeedbackRepository constructor.
     * @param VideoCms $video
     */
    public function __construct(VideoCms $video)
    {
        $this->model = $video;
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
