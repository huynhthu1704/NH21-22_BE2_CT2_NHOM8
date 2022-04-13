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
            $table->id();
            $table->string('username');
            $table->string('fullName');
            $table->string('password');
            $table->string('email')->unique();
            $table->datetime('birthday');
            $table->string('gender');
            $table->string('phone');
            $table->string('address');
            $table->dateTime('join_date');
            $table->unsignedBigInteger('role_id');
        });
        Schema::table('users', function( Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('role');

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
