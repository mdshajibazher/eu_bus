<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Information;
use Faker\Generator as Faker;





$factory->define(Information::class, function (Faker $faker) {
    static $number = 1;
    $start_slot = array('09:00','10:40','00:00','14:30','15:50','17:20', '18:40');
    $end_slot =   array('10:30','11:50','13:20','15:40','17:10','18:30', '19:40');
    $day = array('saturday','sunday','monday','tuesday','wednesday','friday');
    return [
        'student' => $number++,
        'current_session' => 'spring2020',
        'class_start' => '10:40',
        'class_end' => $end_slot[rand(0,6)],
        'day' => $day[2],
    ];
});
