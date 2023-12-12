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
        //DB::table('plan_classes')->truncate();
        Schema::create('plan_classes', function (Blueprint $table) {
            $table->id();
            $table->longText('title');
            $table->longText('thumbnail_url')->nullable();
            $table->longText('video_url')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('status')->default('0');
            $table->integer('class_type')->default('0');//0:recorded, 1:not-recorded
            $table->timestamp('duration')->useCurrent();
            $table->string('color')->nullable();
            $table->longText('burn_rate')->nullable();
            $table->unsignedBigInteger('coache_id')->index(); 
            $table->foreign('coache_id')->references('id')->on('coaches')->onDelete('cascade');
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
        Schema::dropIfExists('plan_classes');
    }
};
