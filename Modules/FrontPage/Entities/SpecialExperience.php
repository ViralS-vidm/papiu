<?php

namespace Modules\FrontPage\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\FrontPage\Entities\Traits\Relationship\SpecialExperienceRelationship;

class SpecialExperience extends Model
{
    use SpecialExperienceRelationship;

    protected $table = 'special_experiences';
    protected $fillable = [
        'name'
    ];
}
