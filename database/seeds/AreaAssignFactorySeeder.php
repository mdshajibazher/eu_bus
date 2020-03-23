<?php

use Illuminate\Database\Seeder;

class AreaAssignFactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Areaassign::class, 20)->create();
    }
}
