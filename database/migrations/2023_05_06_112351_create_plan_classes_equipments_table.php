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
        Schema::create('plan_classes_equipments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipment_id')->index(); 
            $table->foreign('equipment_id')->references('id')->on('equipments')->onDelete('cascade');
            $table->unsignedBigInteger('plan_class_id')->index(); 
            $table->foreign('plan_class_id')->references('id')->on('plan_classes')->onDelete('cascade');
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
        Schema::dropIfExists('plan_classes_equipments');
    }
};
