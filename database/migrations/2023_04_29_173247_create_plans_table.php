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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->longText('title');
            $table->longText('image')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('is_free')->default(0);
            $table->decimal('price', 8, 2);
            $table->decimal('old_price', 8, 2)->default(0.00);
            $table->integer('period')->default('1'); //'month','2months','4months','3months','5months','6months' , 7week
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
        Schema::dropIfExists('plans');
    }
};
