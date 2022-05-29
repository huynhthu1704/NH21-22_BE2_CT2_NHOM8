<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username'       => 'thuhuynh',
                'password'             => '12345',
                'email'             => 'huynhthungocthu1704@gmail.com',
                'birthday'             => '2002-05-27',
                'full_name'             => 'Huynh Thi Ngoc Thu',
                'phone'             => '0368854166',
                'address'             => '53 Vo Van Ngan ,Linh Chieu, Thu Duc',
                'gender'             => '1',
                'join_day'             => '2022-05-27',
                'provider'             => 'normal',
                'role_id'             => '1',
            ],
            [
                'username'       => 'hongngoc',
                'password'             => '12345',
                'email'             => 'buihongngoc@gmail.com',
                'birthday'             => '2002-05-27',
                'full_name'             => 'Huynh Thi Ngoc Thu',
                'phone'             => '0368854166',
                'address'             => '53 Vo Van Ngan ,Linh Chieu, Thu Duc',
                'gender'             => '1',
                'join_day'             => '2022-05-27',
                'provider'             => 'normal',
                'role_id'             => '1',
            ],
        ]);
    }
}
