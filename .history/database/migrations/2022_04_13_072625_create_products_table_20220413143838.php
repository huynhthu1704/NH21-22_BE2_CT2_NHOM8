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
            $table->string('product_name');
            $table->unsignedBigInteger('cate_id');
            $table->integer('price');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('img_id');
            $table->string('desc');
            $table->tinyInteger('is_feature');
            $table->unsignedBigInteger('dimension_id');
            $table->unsignedBigInteger('discount_id');
            $table->timestamps('created_at');
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