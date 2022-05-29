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
                'id'             => 1,
                'username'       => 'thuhuynh',
                'password'       => md5('thu12345'),
                'email'          => 'huynhthungocthu1704@gmail.com',
                'birthday'       => '2002-05-27',
                'fullname'       => 'Huynh Thi Ngoc Thu',
                'phone'          => '0368854166',
                'city'           => "HCMC",
                'district'       => "Thu Duc",
                'ward'           => "Linh Chieu",
                'address'        => "53 Vo Van Ngan",
                'gender'         => '1',
                'join_day'       => '2022-05-27',
                'provider'       => 'normal',
                'role_id'        => '1',
            ],
            [
                'id'             => 1,
                'username'       => 'hongngoc',
                'password'       =>  md5('ngoc12345'),
                'email'          => 'buihongngoc.tdc2020@gmail.com',
                'birthday'       => '2002-05-27',
                'fullname'       => 'Huynh Thi Ngoc Thu',
                'phone'          => '0368854166',
                'city'           => "HCMC",
                'district'       => "Thu Duc",
                'ward'           => "Linh Chieu",
                'address'        => "53 Vo Van Ngan",
                'gender'         => '1',
                'join_day'       => '2022-05-27',
                'provider'       => 'normal',
                'role_id'        => '1',
            ],
        ]);
    }
}
