<?php

namespace Modules\FrontPage\Entities;

use Illuminate\Database\Eloquent\Model;

class Overview extends Model
{
    protected $table = 'overview';
    protected $fillable = [
        'content'
    ];
}
