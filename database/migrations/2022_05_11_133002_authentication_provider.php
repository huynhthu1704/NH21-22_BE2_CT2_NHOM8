<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AuthenticationProvider extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AuthenticationProvider', function (Blueprint $table) {
            
            $table->integer('userId')->unique();
            $table->string('ProviderKey', 128)->primary();
            $table->enum('ProviderType', ['facebook','twitter', 'google'])->nullable(false);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
