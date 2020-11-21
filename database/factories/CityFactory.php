<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        'name' => $faker->country,
        'description' => $faker->text($maxNbChars = 191),
        'imageurl' => 'https://source.unsplash.com/user/peterlaster',
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
