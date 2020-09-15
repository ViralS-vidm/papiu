<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Feedback\Entities\Feedback;

$factory->define(Feedback::class, function (Faker $faker) {
    return [
        'name'    => $faker->name,
        'email'   => $faker->email,
        'content' => $faker->sentence,
        'rate'    => $faker->numberBetween(1, 5),
    ];
});
