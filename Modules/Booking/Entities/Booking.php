<?php

namespace Modules\Booking\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Booking\Entities\Traits\Attributes\BookingAttribute;
use Modules\Booking\Entities\Traits\Methods\BookingMethod;
use Modules\Booking\Entities\Traits\Relationship\BookingRelationship;
use Modules\Booking\Entities\Traits\Scope\BookingScope;
use Modules\Booking\Events\BookingCreated;

class Booking extends Model
{
    use BookingScope, BookingRelationship, SoftDeletes, BookingMethod, BookingAttribute;

    const STATUS_NEW = 1;
    const STATUS_CHECKED_IN = 2;
    const STATUS_CHECKED_OUT = 3;
    const STATUS_CHECKED_COMPLETED = 4;

    protected $dispatchesEvents = [
        'created' => BookingCreated::class,
    ];

    protected $table = 'bookings';
    protected $fillable = [
        'short_code', 'product_id', 'num_client', 'time_start', 'time_end', 'checked_in_at', 'checked_out_at',
        'completed_at', 'status', 'total_price', 'room_price', 'service_price', 'contact_name', 'contact_email', 'contact_number', 'address'
    ];
}
