<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('supplier_code',7)->nullable();
            $table->string('company_name', 50)->nullable();
            $table->string('contact_fname', 30)->nullable();
            $table->string('contact_lname', 50)->nullable();
            $table->string('contact_title', 30)->nullable();
            $table->string('address', 256)->nullable();
            $table->string('address2', 50)->nullable();
            $table->string('city', 15)->nullable();
            $table->string('state', 25)->nullable();
            $table->string('postal_code', 15)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('phone', 25)->nullable();
            $table->string('fax', 25)->nullable();
            $table->string('email', 75)->nullable();
            $table->string('website', 100)->nullable();
            $table->string('payment_methods', 100)->nullable();
            $table->string('discount_type', 100)->nullable();
            $table->string('discount_rate', 100)->nullable();
            $table->string('type_goods', 255)->nullable();
            $table->boolean('discount_available')->nullable();
            $table->boolean('current_order')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('size_url', 50)->nullable();
            $table->string('logo', 75)->nullable();
            $table->integer('ranking')->nullable();
            $table->string('note', 255)->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('suppliers');
    }
}
