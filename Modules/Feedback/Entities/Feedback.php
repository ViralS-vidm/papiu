<?php

namespace Modules\Feedback\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Feedback\Entities\Traits\Scope\FeedbackScope;

class Feedback extends Model
{
    use FeedbackScope;

    const STATUS_NEW = 1;
    const STATUS_REPLIED = 2;

    protected $table = 'feedbacks';
    protected $fillable = ['name', 'email', 'content', 'phone', 'dob', 'job', 'status'];

    public static function statusName()
    {
        return [
            self::STATUS_NEW => __('feedback::labels.status_labels.new'),
            self::STATUS_REPLIED => __('feedback::labels.status_labels.replied'),
        ];
    }
}
