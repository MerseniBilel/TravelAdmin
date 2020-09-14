<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use App\Hotel;
use Faker\Generator as Faker;

$factory->define(Hotel::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text($maxNbChars = 191),
        'rating'=> $faker->numberBetween($min = 1, $max = 5),
        'address' => $faker->address,
        'price' => $faker->numberBetween($min = 100, $max = 900),
        'imageurl' => $faker->imageUrl($width = 500, $height = 500, 'city'),
        'city_id' => City::get('id')->random(),
        'created_at' => now(),
        'updated_at' => now(),

        // i need to add an HOTELIMAGES table that containe all the images related to this hotel
    ];
});
