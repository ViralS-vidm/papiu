<?php

namespace Modules\Image\Repositories\Contracts;


use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\Contracts\BaseRepositoryInterface;

interface ImageRepositoryInterface extends BaseRepositoryInterface
{
    public function addImages(Model $model, $attributes = []);

    public function syncImages(Model $model, $images = []);

    public function attachImages(Model $model, $images = []);

    public function deleteImages(Model $model, $images = []);
}
