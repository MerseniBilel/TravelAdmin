<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        // i need to add a table caled CITYIMAGES that contain all the images related to this city
    ];
});
