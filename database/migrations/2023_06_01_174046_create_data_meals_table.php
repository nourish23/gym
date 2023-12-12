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
        Schema::create('data_meals', function (Blueprint $table) {
            $table->id();
            $table->longText('body');
            $table->unsignedBigInteger('day_id')->index(); 
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
            $table->unsignedBigInteger('meal_id')->index(); 
            $table->foreign('meal_id')->references('id')->on('meals')->onDelete('cascade');
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
        Schema::dropIfExists('data_meals');
    }
};
