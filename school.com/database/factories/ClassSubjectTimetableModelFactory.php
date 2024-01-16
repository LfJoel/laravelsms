<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ClassSubjectTimetableModel;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ClassSubjectTimetableModelFactory extends Factory
{
    protected $model = ClassSubjectTimetableModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'class_id' => $this->faker->numberBetween(1, 10),
            'subject_id' => $this->faker->numberBetween(1, 10),
            'week_id' => $this->faker->numberBetween(1, 7),
            'start_time' => $this->faker->time('H:i'),
            'end_time' => $this->faker->time('H:i'),
            'created_at' => now(),
            'updated_at' => now(),
            'room_number' => $this->faker->numberBetween(1, 20),
        ];
    }
}
