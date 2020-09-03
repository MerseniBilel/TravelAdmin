<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hotel;
use App\HotelImage;
use Faker\Generator as Faker;

$factory->define(HotelImage::class, function (Faker $faker) {
    return [
        'imageurl' => $faker->imageUrl($width = 500, $height = 500, 'nature'),
        'hotel_id' => Hotel::get('id')->random(),
        'created_at'=> now(),
        'updated_at' => now(),
        // the id of the image 
        // the alt of the image => will use it in the blade
        // the faker->imageurl(200,200) or lorempic url
    ];
});
