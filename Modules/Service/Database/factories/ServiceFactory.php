<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Service\Entities\Service;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'name'              => $faker->sentence,
        'description'       => $faker->sentence,
        'price'             => $faker->randomFloat(2, 10, 100),
        'price_description' => $faker->sentence,
    ];
});
