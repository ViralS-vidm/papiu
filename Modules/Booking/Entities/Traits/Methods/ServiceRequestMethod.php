<?php

namespace Modules\Booking\Entities\Traits\Methods;

use Modules\Booking\Entities\ServiceRequest;

trait ServiceRequestMethod
{
    /**
     * @return array
     */
    public static function statusName()
    {
        return [
            ServiceRequest::STATUS_NEW       => __('booking::labels.status_value.new'),
            ServiceRequest::STATUS_COMPLETED => __('booking::labels.status_value.completed'),
        ];
    }
}
