<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Activity;
use Faker\Generator as Faker;

$factory->define(Activity::class, function (Faker $faker) {
    return [
       // i need to add activitie icon.svg that describe the activity
       // i will need the icon in Flutter as a button to list all the cities and hotels that containe this activity 
    ];
});
