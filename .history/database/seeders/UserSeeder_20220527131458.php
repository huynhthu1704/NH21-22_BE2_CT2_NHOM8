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
        $table->id();
        $table->string('username', 200)->unique();
        $table->string('password', 200);
        $table->string('email', 2000);
        $table->date('birthday')->default(now());
        $table->string('full_name', 200);
        $table->string('phone', 32)->default('1');
        $table->text('address')->default('1');
        $table->string('gender', 15)->default('1');
        $table->date('join_day')->default(now());
        $table->enum('provider', ['normal', 'google', 'facebook'])->default('normal');
        $table->unsignedBigInteger('role_id');
        $table->timestamps();
        User::table('users')->insert([
            'id'             => '',
            'username'       => '',
            'id'             => '',
            'id'             => '',
            'id'             => '',
            'id'             => '',
            'id'             => '',
            'id'             => '',
            'id'             => '',
            'id'             => '',

        ]);
    }
}
