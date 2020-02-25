<?php

use Illuminate\Database\Seeder;

class RouteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('route')->insert(
            ['name' => 'Route 1']
        );
        DB::table('route')->insert(
            ['name' => 'Route 2']
        );
        DB::table('route')->insert(
            ['name' => 'Route 3']
        );
        DB::table('route')->insert(
            ['name' => 'Route 4']
        );
        DB::table('route')->insert(
            ['name' => 'Route 5']
        );
        DB::table('route')->insert(
            ['name' => 'Route 6']
        );
        DB::table('route')->insert(
            ['name' => 'Route 7']
        );
        DB::table('route')->insert(
            ['name' => 'Route 8']
        );
        DB::table('route')->insert(
            ['name' => 'Route 9']
        );
        DB::table('route')->insert(
            ['name' => 'Route 10']
        );
    }
}
