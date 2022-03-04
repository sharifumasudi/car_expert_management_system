<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('c_id');
            $table->string('c_name');
            $table->string('fuel_type'); //Gas Engines, Hybrid and Electric Engines,Diesel Engines
            $table->string('transimission_mode'); //Either auto or Manual
            $table->string('licence')->nullable();
            $table->string('brand_name');
            $table->timestamps();
        });

        Schema::create('car_users',function(Blueprint $table)
        {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('car_id');

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('car_id')->references('c_id')->on('cars')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['user_id', 'car_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
        Schema::dropIfExists('car_users');
    }
}
