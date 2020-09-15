<?php


namespace Modules\Booking\Services\Contracts;


use Illuminate\Database\Eloquent\Model;
use Modules\Booking\Entities\Booking;

interface BookingServiceInterface
{
    public function dataForm(Booking $booking = null);

    public function updateStatus($id, $status);

    public function create(array $attributes);

    public function updateById($id, array $attributes);

    public function verifyFormatDate($attributes);

    public function syncRelation(Model $booking, $attributes);

    public function getPrevStatus($status);

    public function getNextStatus($status);

    public function getFieldTimeUpdate($status);

    public function handlePrice($attributes);

}