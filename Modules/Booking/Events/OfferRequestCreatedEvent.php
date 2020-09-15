<?php

namespace Modules\Booking\Events;

use Illuminate\Queue\SerializesModels;

class OfferRequestCreatedEvent
{
    use SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct()
    {
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
