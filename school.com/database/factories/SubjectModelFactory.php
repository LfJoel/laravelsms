<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SubjectModel;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SubjectModelFactory extends Factory
{
    protected $model = SubjectModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'type' => $this->faker->randomElement(['Practical', 'Theory']),
            'is_delete' => 0,
            'created_by' => $this->faker->numberBetween(1, 10),
            'status' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
