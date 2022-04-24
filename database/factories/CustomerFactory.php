<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);

        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'address' => $this->faker->address(),
            'zip_code' => $this->faker->postcode(),
            'phone_number' => $this->faker->e164PhoneNumber(),
            'email' => $this->faker->safeEmail(),
            'gender'  => $gender,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
