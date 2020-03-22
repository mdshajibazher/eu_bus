<?php

use Illuminate\Database\Seeder;

class CurrentSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('current_session')->insert(
            [
                'session_name' => 'Spring',
                'session_slug' => 'spring2020',
                'year' => '2020',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
    }
}
