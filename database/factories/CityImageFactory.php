<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CityImage;
use Faker\Generator as Faker;

$factory->define(CityImage::class, function (Faker $faker) {
    return [
        // the id of the image 
        // the alt of the image => will use it in the blade
        // the faker->imageurl(200,200) or lorempic url
    ];
});
