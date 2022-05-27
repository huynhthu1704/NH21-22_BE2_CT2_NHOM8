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
            'birthday'             => '2020-05-27',
            'full_name'             => '',
            'phone'             => '',
            'address'             => '',
            'gender'             => '',
            'join_day'             => '2022-05-27',
            'provider'             => '',
            'role_id'             => '',
        ]);
    }
}
