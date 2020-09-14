<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        'name' => $faker->country,
        'description' => $faker->text($maxNbChars = 191),
        'imageurl' => $faker->imageUrl($width = 500, $height = 500, 'city'),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
