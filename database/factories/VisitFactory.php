<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Visit;
use Faker\Generator as Faker;

$factory->define(Visit::class, function (Faker $faker) {
    return [
        'date' => $faker->dateTimeBetween('now', '+30 days'),
        'time' => $faker->time,
        'duration' => $faker->randomElement($array = array('15 minutes','30 minutes','1 hour')), //random element from the array
        'cost' => $faker->numberBetween(50,200),
    ];
});
