<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(areaTableSeeder::class);
        $this->call(RouteTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(userTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(BusesTableSeeder::class);
        $this->call(UserFactorySeeder::class);
        $this->call(TimeSlotSeeder::class);
        $this->call(CurrentSessionSeeder::class);
        
    }
}
