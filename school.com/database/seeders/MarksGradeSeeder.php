<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Random;
use Faker\Factory as Faker;

class MarksGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('marks_grade')->truncate();
        $faker = Faker::create();
        // Seed the table with provided data
        $grades = [
            [ 'name' => 'E', 'percent_from' => 0, 'percent_to' => 35, 'created_at' => now(), 'updated_at' => now(), 'created_by' =>$faker->numberBetween(1,10)],
            ['name' => 'D', 'percent_from' => 35, 'percent_to' => 50, 'created_at' => now(), 'updated_at' => now(), 'created_by' => $faker->numberBetween(1,10)],
            [ 'name' => 'C', 'percent_from' => 50, 'percent_to' => 70, 'created_at' => now(), 'updated_at' => now(), 'created_by' => $faker->numberBetween(1,10)],
            [ 'name' => 'B', 'percent_from' => 70, 'percent_to' => 85, 'created_at' => now(), 'updated_at' => now(), 'created_by' => $faker->numberBetween(1,10)],
            [ 'name' => 'A', 'percent_from' => 85, 'percent_to' => 100, 'created_at' => now(), 'updated_at' => now(), 'created_by' => $faker->numberBetween(1,10)],
        ];

        DB::table('marks_grade')->insert($grades);
    }
}
