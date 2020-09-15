<?php


namespace Modules\Payment\Entities\Traits\Relationship;


use Modules\Booking\Entities\Booking;

trait PaymentRelationship
{
    /**
     * @return mixed
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}