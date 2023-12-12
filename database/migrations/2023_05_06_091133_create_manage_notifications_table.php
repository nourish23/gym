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
        Schema::create('manage_notifications', function (Blueprint $table) {
            $table->id();
            $table->longText('title');
            $table->longText('text');
            //PushNotificationRule
            $table->integer('before_days_num')->default(0);
            $table->enum('type',['email','notification','email_and_notification'])->default('notification');
            $table->unsignedBigInteger('day_id')->index(); 
            $table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
            $table->unsignedBigInteger('email_template_id')->index(); 
            $table->foreign('email_template_id')->references('id')->on('email_templates')->onDelete('cascade');
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
        Schema::dropIfExists('manage_notifications');
    }
};
