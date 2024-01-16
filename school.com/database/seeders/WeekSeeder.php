<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('week')->truncate();

        $weeks = [            
            ['name' => 'Monday', 'full_calendar_day' => 1,  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tuesday', 'full_calendar_day' => 2,  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Wednesday', 'full_calendar_day' => 3,  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Thursday', 'full_calendar_day' => 4,  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Friday', 'full_calendar_day' => 5,  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Saturday', 'full_calendar_day' => 6,  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sunday', 'full_calendar_day' => 0,  'created_at' => now(), 'updated_at' => now()],

        ];
    
        DB::table('week')->insert($weeks);
    }
}
