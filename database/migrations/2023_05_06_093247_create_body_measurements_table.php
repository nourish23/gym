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
        Schema::create('body_measurements', function (Blueprint $table) {
            $table->id();
            $table->double('weight')->default(0);
            $table->double('height')->default(0);
            $table->double('chest')->nullable()->default(0);
            $table->double('waist')->nullable()->default(0);
            $table->double('abs')->nullable()->default(0);
            $table->double('hips')->nullable()->default(0);
            $table->double('left_thigh')->nullable()->default(0);
            $table->double('right_thigh')->nullable()->default(0);
            $table->double('left_arm')->nullable()->default(0);
            $table->double('right_arm')->nullable()->default(0);
            $table->softDeletes(); 
            $table->unsignedBigInteger('user_id')->index(); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('body_measurements');
    }
};
