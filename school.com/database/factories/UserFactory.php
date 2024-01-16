<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      return [
        'parent_id' => null,
        'name' => $this->faker->name,
        'last_name' => $this->faker->lastName,
        'email' => $this->faker->unique()->safeEmail(),
        'email_verified_at' => now(),
        'password' => Hash::make('password'), 
        'remember_token' => Str::random(10),
        'user_type' => $this->faker->numberBetween(1, 4),
        'admission_number' => $this->faker->unique()->randomNumber(8),
        'roll_number' => $this->faker->unique()->randomNumber(8),
        'class_id' => $this->faker->randomNumber(2),
        'gender' => $this->faker->randomElement(['Male', 'Female']),
        'date_of_birth' => $this->faker->date,
        'caste' => $this->faker->word,
        'religion' => $this->faker->word,
        'mobile_number' => $this->faker->phoneNumber,
        'admission_date' => $this->faker->date,
        'profile_pic' => null, 
        'blood_group' => $this->faker->randomElement(['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-']),
        'height' => $this->faker->randomFloat(2, 150, 200),
        'weight' => $this->faker->randomFloat(2, 40, 150),
        'occupation' => $this->faker->word,
        'address' => $this->faker->address,
        'permanent_address' => $this->faker->address,
        'marital_status' => $this->faker->randomElement(['Single', 'Married', 'Divorced']),
        'qualification' => $this->faker->word,
        'work_experience' => $this->faker->word,
        'note' => $this->faker->sentence,
        'is_delete' => 0,
        'status' => $this->faker->numberBetween(0, 1),
        'created_at' => now(),
        'updated_at' => now(),
    ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
