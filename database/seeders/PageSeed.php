<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;
use Illuminate\Support\Facades\Schema;

class PageSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Page::truncate();
        Schema::enableForeignKeyConstraints();
        Page::create([
            'id' => '1',
            'title' => ['en' => 'Terms and Condition' , 'ar' => 'أحكام وشروط'],
            'description' => [
                'en' => 'Using live stream service and in collaboration with group of the best and most qualified fitness instructors in the field, we provide online fitness classes every day in various timings during the day which will fit all types of members and will suit their need',
                'ar' => 'باستخدام خدمة البث المباشر وبالتعاون مع مجموعة من أفضل مدربي اللياقة البدنية وأكثرهم تأهيلا في هذا المجال ، نقدم فصول لياقة بدنية عبر الإنترنت كل يوم في أوقات مختلفة خلال اليوم والتي تناسب جميع أنواع الأعضاء وسوف تناسب احتياجاتهم'
            ],
            'status' => '1'
        ]);


        Page::create([
            'id' => '2',
            'title' => ['en' => 'Privacy Policy' , 'ar' => 'سياسة الخصوصية'],
            'description' => [
                'en' => 'Using live stream service and in collaboration with group of the best and most qualified fitness instructors in the field, we provide online fitness classes every day in various timings during the day which will fit all types of members and will suit their need',
                'ar' => 'باستخدام خدمة البث المباشر وبالتعاون مع مجموعة من أفضل مدربي اللياقة البدنية وأكثرهم تأهيلا في هذا المجال ، نقدم فصول لياقة بدنية عبر الإنترنت كل يوم في أوقات مختلفة خلال اليوم والتي تناسب جميع أنواع الأعضاء وسوف تناسب احتياجاتهم'
            ],
            'status' => '1'
        ]);

    }
}
