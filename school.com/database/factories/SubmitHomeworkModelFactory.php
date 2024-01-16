<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SubmitHomeworkModel;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SubmitHomeworkModelFactory extends Factory
{
    protected $model = SubmitHomeworkModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'homework_id' => $this->faker->numberBetween(1, 10),
            'student_id' => $this->faker->numberBetween(1, 10),
            'description' => $this->faker->text,
            'created_at' => now(),
            'document_file' => null, 
            'updated_at' => now(),
        ];
    }
}
