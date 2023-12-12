<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutrition_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index(); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('body_measurement_id')->index(); 
            $table->foreign('body_measurement_id')->references('id')->on('body_measurements')->onDelete('cascade');
            $table->unsignedBigInteger('plan_id')->index(); 
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->unsignedBigInteger('day_id')->index(); 
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
            $table->longText('meal');
            $table->text('time_of_meal');
            $table->boolean('status')->default('1');
            $table->softDeletes();
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
        Schema::dropIfExists('nutrition_plans');
    }
};
