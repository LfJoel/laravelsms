<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ChatModel;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChatModel>
 */
class ChatModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ChatModel::class;

    public function definition()
    {
        return [
            'sender_id' => function () {
                return User::factory()->create()->id;
            },
            'receiver_id' => function () {
                return User::factory()->create()->id;
            },
            'message' => $this->faker->text,
            'file' => $this->faker->word,
            'status' => $this->faker->numberBetween(0, 1),
            'created_date' => $this->faker->unixTime,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
