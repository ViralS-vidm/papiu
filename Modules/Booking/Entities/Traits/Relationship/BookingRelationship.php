<?php


namespace Modules\Booking\Entities\Traits\Relationship;


use Modules\Payment\Entities\Payment;
use Modules\Product\Entities\Product;
use Modules\Service\Entities\Service;

trait BookingRelationship
{
    /**
     * @return mixed
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * @return mixed
     */
    public function services()
    {
        return $this->belongsToMany(Service::class, 'booking_services', 'booking_id', 'service_id');
    }

    /**
     * @return mixed
     */
    public function payments()
    {
        return $this->hasMany(Payment::class, 'booking_id');
    }
}