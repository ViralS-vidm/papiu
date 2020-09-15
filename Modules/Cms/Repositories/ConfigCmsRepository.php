<?php

namespace Modules\Cms\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Cms\Entities\ConfigCms;
use Modules\Cms\Repositories\Contracts\ConfigCmsRepositoryInterface;
use Modules\Core\Repositories\BaseRepository;

class ConfigCmsRepository extends BaseRepository implements ConfigCmsRepositoryInterface
{
    /**
     * FeedbackRepository constructor.
     * @param ConfigCms $config
     */
    public function __construct(ConfigCms $config)
    {
        $this->model = $config;
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
