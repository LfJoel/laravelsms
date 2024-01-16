<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AssignClassTeacherModelFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'class_id' => $this->faker->numberBetween(1, 10),
            'teacher_id' => $this->faker->numberBetween(1, 10),
            'status' => 0,
            'is_delete' => 0,
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => $this->faker->numberBetween(1, 10),
        ];
    }
}
