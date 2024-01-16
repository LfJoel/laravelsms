<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ExamScheduleModel;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ExamScheduleModelFactory extends Factory
{
    protected $model = ExamScheduleModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'exam_id' => $this->faker->numberBetween(1, 10),
            'class_id' => $this->faker->numberBetween(1, 10),
            'subject_id' => $this->faker->numberBetween(1, 10),
            'exam_date' => $this->faker->date(), 
            'start_time' => $this->faker->time('H:i'), 
            'end_time' => $this->faker->time('H:i'),
            'room_number' => $this->faker->numberBetween(1, 20),
            'full_marks' => 100,
            'passing_mark'=> $this->faker->randomFloat(35, 75, 100),
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => $this->faker->numberBetween(1, 10),
        ];
    }
}
