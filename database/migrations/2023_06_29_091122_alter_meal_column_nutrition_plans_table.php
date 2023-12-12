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
        Schema::table('nutrition_plans', function (Blueprint $table) {
            $table->dropColumn('meal');
            $table->foreignId('meal_id')
                ->after("plan_id")
                ->constrained('meals', 'id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nutrition_plans', function (Blueprint $table) {
            $table->dropForeign(['meal_id']);
            $table->dropColumn('meal_id');
         });
    }
};
