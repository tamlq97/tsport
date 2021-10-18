<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
            // $table->unsignedBigInteger('color_id')->nullable();
            // $table->foreign('color_id')->references('id')->on('colors')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
            // $table->unsignedBigInteger('product_id')->nullable();
            // $table->foreign('product_id')->references('id')->on('products')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('color_products');
    }
}
