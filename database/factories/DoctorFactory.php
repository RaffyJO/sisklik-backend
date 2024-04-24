<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'specialist' => fake()->word(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'photo' => fake()->imageUrl(),
            'address' => fake()->address(),
            'sip' => fake()->numberBetween(1000, 9999),
            'id_ihs' => fake()->numberBetween(1000, 9999),
            'nik' => fake()->numberBetween(1000000000000000, 9999999999999999)
        ];
    }
}
