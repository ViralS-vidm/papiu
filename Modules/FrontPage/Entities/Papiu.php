<?php

namespace Modules\FrontPage\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\FrontPage\Entities\Traits\Relationship\PapiuRelationship;

class Papiu extends Model
{
    use PapiuRelationship;

    protected $table = 'papiu';
    protected $fillable = [
        'introduce', 'slogan', 'service_introduce'
    ];
}
