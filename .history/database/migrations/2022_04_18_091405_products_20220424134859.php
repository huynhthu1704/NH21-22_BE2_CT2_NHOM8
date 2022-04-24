<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->integer('cate_id');
            $table->integer('price');
            $table->date('brand_id');
            $table->string('img_id');
            $table->text('description');
            $table->integer('is_feature');
            $table->integer('dimension_id');
            $table->integer('discount_id');
            $table->timestamps();
            $table->foreign('cate_id')->references('id')->on('category');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('img_id')->references('id')->on('images');
            $table->foreign('dimension_id')->references('id')->on('demension');
            $table->foreign('discount_id')->references('id')->on('discount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
