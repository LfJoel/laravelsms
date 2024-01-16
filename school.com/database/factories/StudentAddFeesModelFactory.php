<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\StudentAddFeesModel;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentAddFeesModelFactory extends Factory
{
    protected $model = StudentAddFeesModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
 
        return [
            'class_id' => $this->faker->numberBetween(1, 10),
            'student_id' => $this->faker->numberBetween(1, 10),
            'total_amount' => $this->faker->randomNumber(),
            'remaining_amount' => $this->faker->randomNumber(),
            'paid_amount' => $this->faker->randomNumber(),
            'created_at' => now(),
            'updated_at' => now(),
            'payment_type' => $this->faker->randomElement(['Stripe', 'Paypal']),
            'remark' => $this->faker->text,
            'created_by' => $this->faker->numberBetween(1, 10),
            'is_payment' =>0 ,
            'payment_data' => $this->faker->text,
            'stripe_session_id' => $this->faker->text(500),
        ];
    }
}
