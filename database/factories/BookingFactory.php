<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\City;
use App\hotel;
use App\Booking;
use Faker\Generator as Faker;
use Carbon\Carbon;





    $factory->define(Booking::class, function (Faker $faker) {
    $date = Carbon::create(2020,intval($faker->month($max = 'now')) ,intval($faker->dayOfMonth($max = 'now')) , intval($faker->numberBetween($min = 0, $max = 24)), intval($faker->numberBetween($min = 0, $max = 59)), intval($faker->numberBetween($min = 0, $max = 59)));
    return [
        'email' => $faker->unique()->safeEmail,
        'creditcard' => $faker->creditCardNumber,
        'expirationdate' => $faker->creditCardExpirationDateString,
        'cvv' =>$faker->numberBetween($min = 100, $max = 999),
        'hotel_id' => Hotel::get('id')->random(),
        'created_at' => $date->format('Y-m-d H:i:s'),
        'updated_at' => now(),
    ];
});
