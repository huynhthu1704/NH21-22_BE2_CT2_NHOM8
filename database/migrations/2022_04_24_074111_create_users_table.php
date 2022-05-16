<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('users', function (Blueprint $table) {

            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->string('username', 200)->unique();
            $table->string('password', 200);
            $table->string('email', 2000);
            $table->date('birthday');
            $table->string('full_name',200);
            $table->string('phone', 32);
            $table->text('address');
            $table->string('gender', 15);
            $table->date('join_day');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
