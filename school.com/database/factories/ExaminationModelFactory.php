<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ExaminationModel;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ExaminationModelFactory extends Factory
{
    protected $model = ExaminationModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'note' => $this->faker->text,
            'is_delete' => 0,
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => $this->faker->numberBetween(1, 10),
        ];
    }
}
