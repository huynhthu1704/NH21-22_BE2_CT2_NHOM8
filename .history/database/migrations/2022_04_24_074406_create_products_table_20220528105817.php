<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name', 2000);
            $table->unsignedBigInteger('category_id');
            $table->integer('price');
            $table->unsignedBigInteger('brand_id');
            $table->text('description');
            $table->unsignedBigInteger('dimension_id');
            $table->integer('quantity');
            $table->integer('sale_amount');
            $table->integer('discount_id');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('dimension_id')->references('id')->on('dimensions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
