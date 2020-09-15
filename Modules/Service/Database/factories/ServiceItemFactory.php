<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Service\Entities\ServiceItem;

$factory->define(ServiceItem::class, function (Faker $faker) {
    return [
        name => $faker->sentence,
    ];
});
