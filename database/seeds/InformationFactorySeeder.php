<?php

use Illuminate\Database\Seeder;

class InformationFactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Information::class, 300)->create();
    }
}
