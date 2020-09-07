<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use App\Activity;
use Faker\Generator as Faker;

$factory->define(Activity::class, function (Faker $faker) {
    return [
        'name' =>$faker->name,
        'description' => $faker->text($maxNbChars = 191),
        'icon' => $faker->imageUrl($width = 32, $height = 32),
        'city_id' => City::get('id')->random(),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
