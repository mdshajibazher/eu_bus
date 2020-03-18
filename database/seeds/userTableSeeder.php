<?php

use Illuminate\Database\Seeder;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert(
            [
                'name' => 'Md Shajib Azher',
                'studentid' => '202001',
                'email' => 'mdshajibazher@gmail.com',
                'phone' => '01700817934',
                'department' => 1,
                'address' => 'Flat-GF, H-7, Road-4, Block-C,Nobodoi Housing, Mohammadpur, Dhaka',
                'area' => 2,
                'image' => 'default.png',
                'password' => Hash::make('12345678')
            ],

        );
    }
}
