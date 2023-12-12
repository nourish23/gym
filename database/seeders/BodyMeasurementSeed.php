<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BodyMeasurement;
use Illuminate\Support\Facades\Schema;

class BodyMeasurementSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        BodyMeasurement::truncate();
        Schema::enableForeignKeyConstraints();
        BodyMeasurement::create([
            "weight"=> "64.00",
            "height"=> "180",
            "chest"=> "42.00",
            "waist"=> "43.00",
            "abs"=> "33.00",
            "hips"=> "32.00",
            "left_thigh"=> "26.50",
            "right_thigh"=> "28.50",
            "left_arm"=> "18.30",
            "right_arm"=> "20.30",
            "user_id"=> "1"
        ]);


        BodyMeasurement::create([
            "weight"=> "62.00",
            "height"=> "180",
            "chest"=> "41.00",
            "waist"=> "42.00",
            "abs"=> "32.00",
            "hips"=> "31.00",
            "left_thigh"=> "25.00",
            "right_thigh"=> "29.00",
            "left_arm"=> "18.30",
            "right_arm"=> "20.30",
            "user_id"=> "1"
        ]);

        BodyMeasurement::create([
            "weight"=> "60.00",
            "height"=> "180",
            "chest"=> "40.00",
            "waist"=> "40.00",
            "abs"=> "30.00",
            "hips"=> "30.00",
            "left_thigh"=> "25.00",
            "right_thigh"=> "28.00",
            "left_arm"=> "18.00",
            "right_arm"=> "20.00",
            "user_id"=> "1"
        ]);

        BodyMeasurement::create([
            "weight"=> "58.00",
            "height"=> "180",
            "chest"=> "39.00",
            "waist"=> "39.00",
            "abs"=> "29.00",
            "hips"=> "29.00",
            "left_thigh"=> "24.5",
            "right_thigh"=> "27.5",
            "left_arm"=> "17.8",
            "right_arm"=> "19.8",
            "user_id"=> "1"
        ]);


        BodyMeasurement::create([
            "weight"=> "58.00",
            "height"=> "180",
            "chest"=> "39.00",
            "waist"=> "39.00",
            "abs"=> "29.00",
            "hips"=> "29.00",
            "left_thigh"=> "24.5",
            "right_thigh"=> "27.5",
            "left_arm"=> "17.8",
            "right_arm"=> "19.8",
            "user_id"=> "1"
        ]);


        BodyMeasurement::create([
            "weight"=> "58.00",
            "height"=> "180",
            "chest"=> "39.00",
            "waist"=> "39.00",
            "abs"=> "29.00",
            "hips"=> "29.00",
            "left_thigh"=> "24.5",
            "right_thigh"=> "27.5",
            "left_arm"=> "17.8",
            "right_arm"=> "19.8",
            "user_id"=> "1"
        ]);

        BodyMeasurement::create([
            "weight"=> "57.00",
            "height"=> "180",
            "chest"=> "39.00",
            "waist"=> "38.00",
            "abs"=> "28.00",
            "hips"=> "29.00",
            "left_thigh"=> "24.5",
            "right_thigh"=> "27.5",
            "left_arm"=> "17.8",
            "right_arm"=> "19.8",
            "user_id"=> "1"
        ]);


        BodyMeasurement::create([
            "weight"=> "57.00",
            "height"=> "180",
            "chest"=> "39.00",
            "waist"=> "38.00",
            "abs"=> "28.00",
            "hips"=> "29.00",
            "left_thigh"=> "24.5",
            "right_thigh"=> "27.5",
            "left_arm"=> "17.8",
            "right_arm"=> "19.8",
            "user_id"=> "1"
        ]);


        BodyMeasurement::create([
            "weight"=> "56.00",
            "height"=> "180",
            "chest"=> "39.00",
            "waist"=> "37.00",
            "abs"=> "27.00",
            "hips"=> "29.00",
            "left_thigh"=> "24.5",
            "right_thigh"=> "27.5",
            "left_arm"=> "17.8",
            "right_arm"=> "19.8",
            "user_id"=> "1"
        ]);


        BodyMeasurement::create([
           "weight"=> "54.00",
            "height"=> "180",
            "chest"=> "36.00",
            "waist"=> "36.00",
            "abs"=> "26.00",
            "hips"=> "28.00",
            "left_thigh"=> "23.5",
            "right_thigh"=> "26.5",
            "left_arm"=> "16.8",
            "right_arm"=> "18.8",
            "user_id"=> "1"
        ]);


        BodyMeasurement::create([
            "weight"=> "52.00",
            "height"=> "180",
            "chest"=> "34.00",
            "waist"=> "34.00",
            "abs"=> "24.00",
            "hips"=> "26.00",
            "left_thigh"=> "22.5",
            "right_thigh"=> "25.5",
            "left_arm"=> "14.8",
            "right_arm"=> "16.8",
            "user_id"=> "1"
        ]);

    }
}
