<?php


namespace Modules\Payment\Services\Contracts;


use Illuminate\Database\Eloquent\Model;
use Modules\Payment\Entities\Payment;

interface PaymentServiceInterface
{
    public function dataForm(Payment $booking = null);

    public function updateStatus($id, $status);

    public function create(array $attributes);

    public function updateById($id, array $attributes);

    public function syncRelation(Model $booking, $attributes);
}