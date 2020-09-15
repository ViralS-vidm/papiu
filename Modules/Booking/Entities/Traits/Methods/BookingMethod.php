<?php

namespace Modules\Booking\Entities\Traits\Methods;

use Modules\Booking\Entities\Booking;

trait BookingMethod
{
    public function updatePaid($amount)
    {
        $this->paid += $amount;
        $this->save();
    }

    /**
     * @return array
     */
    public static function statusName()
    {
        return [
            Booking::STATUS_NEW               => __('booking::labels.status_value.new'),
            Booking::STATUS_CHECKED_IN        => __('booking::labels.status_value.checked_in'),
            Booking::STATUS_CHECKED_OUT       => __('booking::labels.status_value.checked_out'),
            Booking::STATUS_CHECKED_COMPLETED => __('booking::labels.status_value.completed'),
        ];
    }

    public static function statusNameForFilter()
    {
        return array_merge([0 => __('booking::labels.status_value.all')], static::statusName());
    }
}
