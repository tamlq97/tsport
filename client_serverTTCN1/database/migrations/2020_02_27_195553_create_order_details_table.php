<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->integer('price')->nullable();
            $table->smallInteger('quantity')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('total')->nullable();
            $table->string('size',50)->nullable();
            $table->string('color',50)->nullable();
            $table->foreign('product_id')
            ->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('order_id')
            ->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('order_details');
    }
}
