<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Day;
use Illuminate\Support\Facades\Schema;

class DaysSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Day::truncate();
        Schema::enableForeignKeyConstraints();
        $weekDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        foreach ($weekDays as $key => $day) {
            Day::create([
                'name' =>  $day,
                'day' => $key + 1,
                'status' => '1'
            ]);
        }
    }
}
