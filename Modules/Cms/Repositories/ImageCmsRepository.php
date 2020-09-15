<?php

namespace Modules\Cms\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Cms\Entities\ImageCms;
use Modules\Cms\Repositories\Contracts\ImageCmsRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;

class ImageCmsRepository extends BaseRepository implements ImageCmsRepositoryInterface
{
    /**
     * FeedbackRepository constructor.
     * @param ImageCms $service
     */
    public function __construct(ImageCms $service)
    {
        $this->model = $service;
        $this->relations = ['imageCms'];
    }

    /**
     * @param Model $model
     * @return mixed
     */
    function transformResource(Model $model)
    {
        return $model;
    }

    /**
     * @param array $filters
     * @param array $sorts
     * @return mixed
     */
    public function getAll($filters = [], $sorts = [])
    {
        if (!empty($filters)) {
            $this->filter($filters);
        }
        if (!empty($sorts)) {
            $this->orderBy($sorts);
        } else {
            $this->orderBy(['id' => 'desc']);
        }

        return $this->get();
    }
}
