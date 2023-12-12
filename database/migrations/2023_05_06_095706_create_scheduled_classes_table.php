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
        Schema::create('scheduled_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_class_id')->index(); 
            $table->foreign('plan_class_id')->references('id')->on('plan_classes')->onDelete('cascade');
            $table->unsignedBigInteger('day_id')->index(); 
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->boolean('status')->default('1');
            $table->longText('url')->nullable();
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
        Schema::dropIfExists('scheduled_classes');
    }
};
