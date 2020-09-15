<?php


namespace Modules\Service\Services\Contracts;


use Illuminate\Database\Eloquent\Model;
use Modules\Service\Entities\Offer;

interface OfferServiceInterface
{
    public function dataForm(Offer $product = null);

    public function create(array $attributes);

    public function updateById($id, array $attributes);

    public function syncRelation(Model $offer, $attributes);
}