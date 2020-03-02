<?php

use Illuminate\Database\Seeder;

class BusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buses')->insert(
            [
                'bus_name' => 'Bus 1',
                'route' => 1,
            ]

        );
        DB::table('buses')->insert(
            [
                'bus_name' => 'Bus 2',
                'route' => 2,
            ]

        );
        DB::table('buses')->insert(
            [
                'bus_name' => 'Bus 3',
                'route' => 2,
            ]

        );
    }
}
