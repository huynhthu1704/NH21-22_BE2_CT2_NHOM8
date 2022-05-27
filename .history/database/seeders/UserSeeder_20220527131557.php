<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::table('users')->insert([
            'id'             => '',
            'username'       => '',
            'password'             => '',
            'email'             => '',
            'birthday'             => '',
            'full_name'             => '',
            'phone'             => '',
            'address'             => '',
            'gender'             => '',
            'join_day'             => '',
            'provider'             => '',
            'role_id'             => '',
        ]);
    }
}
