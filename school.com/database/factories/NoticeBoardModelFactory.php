<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\NoticeBoardModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NoticeBoardModel>
 */
class NoticeBoardModelFactory extends Factory
{
    protected $model = NoticeBoardModel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'notice_date' => now(),
            'publish_date' => now(),
            'created_at' => now(),
            'message' => $this->faker->text,
            'updated_at' => now(),
            'created_by' => $this->faker->numberBetween(1, 10),
        ];
    }
}
