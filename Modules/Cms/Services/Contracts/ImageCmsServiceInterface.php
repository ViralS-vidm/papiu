<?php


namespace Modules\Cms\Services\Contracts;


use Illuminate\Database\Eloquent\Model;
use Modules\Cms\Entities\ImageCms;

interface ImageCmsServiceInterface
{
    public function create(array $attributes);

    public function updateById($id, array $attributes);

    public function syncRelation(Model $product, $attributes);

    public function dataForm(ImageCms $product = null);
}
