<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MarksRegisterModel;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MarksRegisterModelFactory extends Factory
{
    protected $model = MarksRegisterModel::class;

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
            'exam_id' => $this->faker->numberBetween(1, 10),
            'class_work' => $this->faker->numberBetween(10,50),
            'home_work' => $this->faker->numberBetween(10,50),
            'test_work' => $this->faker->numberBetween(10,50),
            'exam' => $this->faker->numberBetween(10,50),
            'full_marks' => 100,
            'passing_mark'=> $this->faker->randomNumber(35, 75, 100),
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => $this->faker->numberBetween(1, 10),
        ];
    }
}
