<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Area;
use Faker\Generator as Faker;

$factory->define(Area::class, function (Faker $faker) {
    return [
        'name' => $faker->city(),
        'post_code' => $faker->postcode(),
        'latitude' => $faker->latitude() ,
        'longitude' => $faker->longitude(),
    ];
});
