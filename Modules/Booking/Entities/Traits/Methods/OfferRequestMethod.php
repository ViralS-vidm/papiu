<?php

namespace Modules\Booking\Entities\Traits\Methods;

use Modules\Booking\Entities\OfferRequest;

trait OfferRequestMethod
{
    /**
     * @return array
     */
    public static function statusName()
    {
        return [
            OfferRequest::STATUS_NEW       => __('booking::labels.status_value.new'),
            OfferRequest::STATUS_COMPLETED => __('booking::labels.status_value.completed'),
        ];
    }
}
