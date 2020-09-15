<?php


namespace Modules\FrontPage\Repositories\Contracts;


use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\BaseRepository;
use Modules\FrontPage\Entities\SpecialExperience;

class SpecialExperienceRepository extends BaseRepository implements SpecialExperienceRepositoryInterface
{

    public function __construct(SpecialExperience $specialExperience)
    {
        $this->model = $specialExperience;
        $this->relations = ['overview', 'detailImages'];
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