<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Information;
use Faker\Generator as Faker;





$factory->define(Information::class, function (Faker $faker) {
    static $number = 1;

    $time_array = [
        ['09:00','10:30'],
        ['09:00','11:50'],
        ['09:00','13:20'],
        ['09:00','15:40'],
        ['09:00','17:10'],
        ['09:00','18:30'],
        ['09:00','19:40'],

        ['10:40','11:50'],
        ['10:40','13:20'],
        ['10:40','15:40'],
        ['10:40','17:10'],
        ['10:40','18:30'],
        ['10:40','19:40'],


        ['00:00','13:20'],
        ['00:00','15:40'],
        ['00:00','17:10'],
        ['00:00','18:30'],
        ['00:00','19:40'],


        ['14:30','15:40'],
        ['14:30','17:10'],
        ['14:30','18:30'],
        ['14:30','19:40'],


        ['15:50','17:10'],
        ['15:50','18:30'],
        ['15:50','19:40'],

        ['17:20','18:30'],
        ['17:20','19:40'],

        ['18:40','19:40'],
    ];


    $day = array('saturday','sunday','monday','tuesday','wednesday','friday');
    return [
        'student' => $number++,
        'current_session' => 'spring2020',
        'class_start' => head($time_range = $time_array[rand(0,27)]),
        'class_end' => $time_range[1],
        'day' => $day[5],
    ];
});
