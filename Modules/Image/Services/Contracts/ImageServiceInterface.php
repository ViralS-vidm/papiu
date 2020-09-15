<?php


namespace Modules\Image\Services\Contracts;


use Illuminate\Database\Eloquent\Model;

interface ImageServiceInterface
{
    public function uploadAndSyncImage(Model $model, $images = [], $folderSave = null, $filename = null, $imageType = null);

    public function saveImage($value, $folderSave = null, $filename = null);

    public function attachImages(Model $model, $imageType, $imageIds = []);

    public function syncImage(Model $model, $attributes);
}