<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        $role = random_int(DB::table('roles')->min('id'), DB::table('roles')->max('id'));

        return [
            'username' => $this->faker->unique()->userName(),
            'password' => $this->faker->password(),
            'email' => $this->faker->unique()->safeEmail(),
            'birthday' => $this->faker->dateTimeBetween('1990-01-01', '2012-12-31'),
            'full_name' => $this->faker->name(),
            'phone' => $this->faker->e164PhoneNumber(),
            'address' => $this->faker->address(),
            'gender' => $gender,
            'join_day' => $this->faker->dateTimeBetween('1990-01-01'),
            'role_id' => $role,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
    }
}
