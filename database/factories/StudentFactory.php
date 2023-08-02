<?php

namespace Database\Factories;

use App\Models\Guardian;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => Str::random('20'),
            'parent_id' => Guardian::factory(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'name' => fake()->name(),
            'gender' => fake()->randomElement(['Male', 'Female']),
            'dob' => now()->subYears(rand(5, 10)),
            'birth_id' => Str::random(20),
            'blood_group' => fake()->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']),
            'religion' => fake()->randomElement(['Islam', 'Hindu', 'Christian', 'Buddhist', 'Other']),
            'status' => 'Active',
            'password' => bcrypt('password'),
        ];
    }
}
