<?php

namespace Modules\Payment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Payment\Entities\Traits\Relationship\PaymentRelationship;
use Modules\Payment\Entities\Traits\Scope\PaymentScope;

class Payment extends Model
{
    use PaymentScope, PaymentRelationship, SoftDeletes;

    const STATUS_PENDING = 1;
    const STATUS_PAID = 2;

    protected $table = 'payments';
    protected $fillable = [
        'booking_id', 'status', 'price', 'comment'
    ];

    /**
     * @return array
     */
    public static function statusName()
    {
        return [
            Payment::STATUS_PENDING => __('payment::labels.status_value.pending'),
            Payment::STATUS_PAID => __('payment::labels.status_value.paid'),
        ];
    }
}
