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
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'image_url')) {
                $table->longText('image_url')->nullable()->after('phone_number');
            }

            if (!Schema::hasColumn('users', 'fcm_token')) {
                $table->json('fcm_token')->nullable()->after('phone_number');
            }

            if (!Schema::hasColumn('users', 'plan_id')) {
                $table->unsignedBigInteger('plan_id')->index()->nullable()->after('phone_number');
                $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            }


            if (!Schema::hasColumn('users', 'subscription_end_date')) {
                $table->dateTime('subscription_end_date')->nullable()->after('phone_number');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'image_url')) {
                $table->dropColumn('image_url');
            }

            if (Schema::hasColumn('users', 'fcm_token')) {
                $table->dropColumn('fcm_token');
            }

            if (Schema::hasColumn('users', 'plan_id')) {
                $table->dropForeign(['plan_id']);
                $table->dropColumn('plan_id');
            }


            if (Schema::hasColumn('users', 'subscription_end_date')) {
                $table->dropColumn('subscription_end_date');
            }
       
        });
    }
};
