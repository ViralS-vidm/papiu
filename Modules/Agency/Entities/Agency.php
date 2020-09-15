<?php

namespace Modules\Agency\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Agency\Entities\Traits\Scope\AgencyScope;

class Agency extends Model
{
    use AgencyScope;

    const STATUS_NEW = 1;
    const STATUS_VERIFIED = 2;

    protected $table = 'agencies';
    protected $fillable = ['name', 'dob', 'phone', 'email', 'job', 'city', 'address', 'status'];

    public static function statusName()
    {
        return [
            self::STATUS_NEW => __('agency::labels.status_labels.new'),
            self::STATUS_VERIFIED => __('agency::labels.status_labels.verified'),
        ];
    }
}
