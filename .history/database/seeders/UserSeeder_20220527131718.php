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
            'id'             => '1',
            'username'       => 'thuhuynh',
            'password'             => '12345',
            'email'             => 'huynhthungocthu1704@gmail.com',
            'birthday'             => '2002-05-27',
            'full_name'             => 'Huynh Thi Ngoc Thu',
            'phone'             => '0368854166',
            'address'             => '53 Vo Van Ngan ,Linh Chieu, Thu Duc',
            'gender'             => '',
            'join_day'             => '2022-05-27',
            'provider'             => '',
            'role_id'             => '',
        ]);
    }
}
