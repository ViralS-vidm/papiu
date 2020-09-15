<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Service\Entities\Offer;

$factory->define(Offer::class, function (Faker $faker) {
    return [
        'name'        => $faker->words(3, true),
        'description' => $faker->sentence,
    ];
});
