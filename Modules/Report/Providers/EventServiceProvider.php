<?php

namespace Modules\Report\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Booking\Events\BookingCompletedEvent;
use Modules\Booking\Events\OfferRequestCreatedEvent;
use Modules\Booking\Events\ServiceRequestCreatedEvent;
use Modules\Report\Listeners\UpdateBookingCompletedListener;
use Modules\Report\Listeners\UpdateOfferRequestListener;
use Modules\Report\Listeners\UpdateServiceRequestListener;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        OfferRequestCreatedEvent::class   => [
            UpdateOfferRequestListener::class,
        ],
        ServiceRequestCreatedEvent::class => [
            UpdateServiceRequestListener::class,
        ],
        BookingCompletedEvent::class      => [
            UpdateBookingCompletedListener::class,
        ]
    ];
}
