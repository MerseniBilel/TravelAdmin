<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use App\CityImage;
use Faker\Generator as Faker;

$factory->define(CityImage::class, function (Faker $faker) {
    return [
        'imageurl' => $faker->imageUrl($width = 500, $height = 500, 'city'),
        'city_id' => City::get('id')->random(),
        'created_at' => now(),
        'updated_at' => now(),
        
       
        // random number form the city Model
    ];
});
