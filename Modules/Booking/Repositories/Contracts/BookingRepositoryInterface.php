<?php


namespace Modules\Booking\Repositories\Contracts;


use Modules\Core\Repositories\Contracts\BaseRepositoryInterface;

interface BookingRepositoryInterface extends BaseRepositoryInterface
{
    public function getLasRecordWithTrashed();

    public function updatePaid($id, $amount);

    public function incomplete();
}
