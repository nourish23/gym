<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Classes;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeed::class);
        $this->call(CategoriesSeed::class);
        $this->call(UserSeed::class);
        $this->call(CoachSeed::class);
        $this->call(ServicesSeed::class);
        $this->call(DaysSeed::class);
        $this->call(SliderSeed::class);
        $this->call(ConfigSeed::class);
        $this->call(PageSeed::class);
        $this->call(CountrySeed::class);
        $this->call(EquipmentNeededSeed::class);
        $this->call(BodyMeasurementSeed::class);
        $this->call(ClassSeeder::class);
        $this->call(recordedScheduleSeed::class);
        $this->call(ClassesScheduleSeed::class);
        $this->call(WeeksSeed::class);
        $this->call(reviewsSeed::class);
        $this->call(blogSeed::class);

    }
}
