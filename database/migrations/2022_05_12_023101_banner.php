<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Banner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Banner', function(Blueprint $table){
            $table->id();
            $table->string('title', 255);
            $table->string('content',255);
            $table->string('pageName',255);
            $table->string('position', 255);
            $table->string('imgSrc', 500);
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
