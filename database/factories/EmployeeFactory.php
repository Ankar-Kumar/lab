<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
        'job_title' => fake()->jobTitle,
        'joining_date' => fake()->date(),
        'salary' => fake()->randomFloat(2, 1000, 100000),  // Random salary between 20,000 and 100,000
        'email' => fake()->unique()->safeEmail,
        'mobile_no' => fake()->unique()->phoneNumber(),  // Generates a random 11 digit mobile number
        'address' => fake()->address,
        ];
    }
}
