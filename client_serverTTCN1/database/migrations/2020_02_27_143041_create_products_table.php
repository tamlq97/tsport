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
            $table->bigIncrements('id');
            $table->string('masp')->unique();
            $table->string('product_name', 60)->nullalbe();
            $table->text('product_description')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->integer('product_price')->nullable();
            $table->boolean('available_size')->nullable();
            $table->boolean('available_colors')->nullable();
            $table->integer('discount',0)->nullable();
            $table->boolean('product_available')->nullable();
            $table->boolean('discount_available')->nullable();
            $table->boolean('current_order')->nullable();
            $table->string('picture', 256)->nullable();
            $table->string('second_image', 256)->nullable();

            $table->integer('ranking')->nullable();
            $table->string('note', 255)->nullable();
            $table->string('slug', 256)->nullable();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->timestamps();
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
