<?php


namespace Modules\Cms\Services\Contracts;


use Illuminate\Database\Eloquent\Model;
use Modules\Cms\Entities\VideoCms;

interface VideoCmsServiceInterface
{
    public function create(array $attributes);

    public function updateById($id, array $attributes);

    public function syncRelation(Model $product, $attributes);

    public function dataForm(VideoCms $product = null);
}
