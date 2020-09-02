<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hotel;
use Faker\Generator as Faker;

$factory->define(Hotel::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text($maxNbChars = 200),
        'rating'=> $faker->numberBetween($min = 1, $max = 5),
        'address' => $faker->StreetAdress,

        // i need to add an HOTELIMAGES table that containe all the images related to this hotel
    ];
});
