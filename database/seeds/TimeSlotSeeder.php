<?php

use Illuminate\Database\Seeder;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('time_slots')->insert(
            [
                'slot_name' => 'Slot 1',
                'start' => '09:00',
                'end' => '10:30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('time_slots')->insert(
            [
                'slot_name' => 'Slot 2',
                'start' => '10:40',
                'end' => '11:50',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('time_slots')->insert(
            [
                'slot_name' => 'Slot 3',
                'start' => '00:00',
                'end' => '13:20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('time_slots')->insert(
            [
                'slot_name' => 'Slot 4',
                'start' => '14:30',
                'end' => '15:40',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        DB::table('time_slots')->insert(
            [
                'slot_name' => 'Slot 5',
                'start' => '15:50',
                'end' => '17:10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        DB::table('time_slots')->insert(
            [
                'slot_name' => 'Slot 6',
                'start' => '17:20',
                'end' => '18:30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        DB::table('time_slots')->insert(
            [
                'slot_name' => 'Slot 7',
                'start' => '18:40',
                'end' => '19:40',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
    }
}
