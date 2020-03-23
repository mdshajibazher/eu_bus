<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Areaassign;
use Faker\Generator as Faker;

$factory->define(Areaassign::class, function (Faker $faker) {

    static $number = 20;
    return [
        'route' =>9,
        'area' => $number= $number+4,
    ];
});
