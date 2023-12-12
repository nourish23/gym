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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->longText('first_name');
            $table->longText('last_name');
            $table->longText('phone_number');
            $table->string('email')->unique();
            $table->string('password');
            $table->char('age', 2)->nullable();
            $table->json('subscription_history')->nullable();
            $table->longText('mobile')->nullable();
            $table->longText('diseases_symptoms')->nullable();
            $table->longText('health_problems')->nullable();
            $table->longText('food_disliked')->nullable();
            $table->longText('food_allergies')->nullable();
            $table->longText('supplements_taken')->nullable();
            $table->longText('do_you_have_anything_else_to_tell_us_about')->nullable();
            $table->longText('how_did_you_hear_about_us')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('subscription_status')->default(1);
            $table->boolean('terms_and_conditions_acceptance')->default(0);
            $table->boolean('policy')->default(0);
            $table->integer('total_class')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
