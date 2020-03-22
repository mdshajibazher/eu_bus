<?php

use Illuminate\Database\Seeder;

class SeatReservationFactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\SeatReservation::class, 40)->create();
    }
}
