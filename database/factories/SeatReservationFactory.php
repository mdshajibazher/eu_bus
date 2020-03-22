<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SeatReservation;
use Faker\Generator as Faker;

$factory->define(SeatReservation::class, function (Faker $faker) {
    static $user=40;
    static $seat = 1;

    return [
        'student' => $user++,
        'bus' => '6',
        'seat' => $seat++,
        'journey_date' => '22-03-2020',
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
