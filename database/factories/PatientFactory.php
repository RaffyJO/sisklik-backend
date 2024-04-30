<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nik' => $this->faker->numerify('##############'),
            'kk' => $this->faker->numerify('##############'),
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'birth_place' => $this->faker->city,
            'birth_date' => $this->faker->date,
            'is_deceased' => false,
            'address_line' => $this->faker->address,
            'city' => $this->faker->city,
            'city_code' => $this->faker->randomNumber(3),
            'province' => $this->faker->state,
            'province_code' => $this->faker->randomNumber(3),
            'district' => $this->faker->citySuffix,
            'district_code' => $this->faker->randomNumber(3),
            'village' => $this->faker->streetName,
            'village_code' => $this->faker->randomNumber(3),
            'rt' => $this->faker->randomNumber(2),
            'rw' => $this->faker->randomNumber(2),
            'postal_code' => $this->faker->randomNumber(5),
            'marital_status' => $this->faker->randomElement(['single', 'married', 'divorced']),
            'relationship_name' => $this->faker->name,
            'relationship_phone' => $this->faker->phoneNumber,
        ];
    }
}
