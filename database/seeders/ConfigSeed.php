<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Config;
use Illuminate\Support\Facades\Schema;

class ConfigSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // type = 'contact','work_times','socialmedia','app_social','app_android_v','app_ios_v'
        Schema::disableForeignKeyConstraints();
        Config::truncate();
        Schema::enableForeignKeyConstraints();
         Config::create([
            'title' => 'WhatsApp',
            'type' => 'contact',
            'value' => '+971561976784',
            'icon' => '#'
        ]); 

         Config::create([
            'title' => 'Email',
            'type' => 'contact',
            'value' => 'info@nourishfitness.net',
            'icon' => '#'
        ]); 

         Config::create([
            'title' => 'twitter',
            'type' => 'app_social',
            'value' => 'twitter.com',
            'icon' => '#'
        ]); 

         Config::create([
            'title' => 'facebook',
            'type' => 'app_social',
            'value' => 'facebook.com',
            'icon' => '#'
        ]); 

         Config::create([
            'title' => 'instgaram',
            'type' => 'app_social',
            'value' => 'instagram.com',
            'icon' => '#'
        ]); 

         Config::create([
            'title' => 'skype',
            'type' => 'app_social',
            'value' => 'skype',
            'icon' => '#'
        ]); 

         Config::create([
            'title' => 'linkedIn',
            'type' => 'app_social',
            'value' => 'linkedIn.com',
            'icon' => '#'
        ]); 

    }
}
