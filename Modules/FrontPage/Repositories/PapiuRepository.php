<?php


namespace Modules\FrontPage\Repositories;


use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\BaseRepository;
use Modules\FrontPage\Entities\Papiu;
use Modules\FrontPage\Repositories\Contracts\PapiuRepositoryInterface;

class PapiuRepository extends BaseRepository implements PapiuRepositoryInterface
{

    /**
     * PapiuRepository constructor.
     * @param Papiu $papiu
     */
    public function __construct(Papiu $papiu)
    {
        $this->model = $papiu;
        $this->relations = ['userExperienceImages', 'overview'];
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