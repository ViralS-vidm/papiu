<?php


namespace Modules\Product\Services\Contracts;


use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Product;

interface ProductServiceInterface
{
    public function create(array $attributes);

    public function updateById($id, array $attributes);

    public function syncRelation(Model $product, $attributes);

    public function dataForm(Product $product = null);

    public function findFree($params);

    public function getBookingCanInTime($params);

}