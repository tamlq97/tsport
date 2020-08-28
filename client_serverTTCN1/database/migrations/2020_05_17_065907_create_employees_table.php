<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30)->nullable();
            $table->string('address', 256)->nullable();
            $table->string('city', 15)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('phone', 25)->nullable();
            $table->string('email')->unique();
            $table->unsignedBigInteger('user_id');
            $table->string('avatar', 256)->nullable();
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
        Schema::dropIfExists('employees');
    }
}
