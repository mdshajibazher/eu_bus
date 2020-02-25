<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department')->insert(
            ['name' => 'CSE','description' => 'Computer Science And Engineering']
        );
        DB::table('department')->insert(
            ['name' => 'EEE','description' => 'Electrical & Electronics Engineering']
        );
        DB::table('department')->insert(
            ['name' => 'BBA','description' => 'Bachelor of Business Administration'],

        );
        DB::table('department')->insert(
            ['name' => 'LAW','description' => 'Law Department'],
        );
    }
}
