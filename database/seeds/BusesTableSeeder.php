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
                'route' => 1,
            ]

        );
        DB::table('buses')->insert(
            [
                'bus_name' => 'Bus 3',
                'route' => 2,
            ]

        );
        DB::table('buses')->insert(
            [
                'bus_name' => 'Bus 4',
                'route' => 2,
            ]

        );
        DB::table('buses')->insert(
            [
                'bus_name' => 'Bus 5',
                'route' => 2,
            ]

        );
        DB::table('buses')->insert(
            [
                'bus_name' => 'Bus 6',
                'route' => 3,
            ]

        );
        DB::table('buses')->insert(
            [
                'bus_name' => 'Bus 7',
                'route' => 4,
            ]

        );
        DB::table('buses')->insert(
            [
                'bus_name' => 'Bus 8',
                'route' =>5,
            ]

        );
        DB::table('buses')->insert(
            [
                'bus_name' => 'Bus 9',
                'route' => 6,
            ]

        );
        DB::table('buses')->insert(
            [
                'bus_name' => 'Bus 10',
                'route' => 7,
            ]

        );
        DB::table('buses')->insert(
            [
                'bus_name' => 'Bus 11',
                'route' => 8,
            ]

        );
        DB::table('buses')->insert(
            [
                'bus_name' => 'Bus 12',
                'route' => 9,
            ]

        );
        DB::table('buses')->insert(
            [
                'bus_name' => 'Bus 13',
                'route' => 10,
            ]

        );

    }
}
