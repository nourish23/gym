<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use Illuminate\Support\Facades\Schema;

class ServicesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Service::truncate();
        Schema::enableForeignKeyConstraints();
        Service::create([
            'title' => ['en' =>  'Online fitness classes' , 'ar' =>  'فصول لياقة بدنية عبر الإنترنت'],
            'text' => [
                'en' => 'Using live stream service and in collaboration with group of the best and most qualified fitness instructors in the field, we provide online fitness classes every day in various timings during the day which will fit all types of members and will suit their need',
                'ar' => 'باستخدام خدمة البث المباشر وبالتعاون مع مجموعة من أفضل مدربي اللياقة البدنية وأكثرهم تأهيلا في هذا المجال ، نقدم فصول لياقة بدنية عبر الإنترنت كل يوم في أوقات مختلفة خلال اليوم والتي تناسب جميع أنواع الأعضاء وسوف تناسب احتياجاتهم'
            ],
            'image' => 'assets/img/ser2.png',
            'price' => '0'
        ]);

        Service::create([
            'title' => ['en' => 'Nutrition plans' , 'ar' => 'خطط التغذية'],
            'text' => [
                'en' => ' Our online nutrition plans membership will provide you complete nutrition follow up which will be listed especially for YOU as per each member weight, height, measurement and health situation, we will make sure to achieve each member health goals.',
                'ar' => ' ستوفر لك عضويتنا في خطط التغذية عبر الإنترنت متابعة كاملة للتغذية والتي سيتم إدراجها خصيصًا لك وفقًا لوزن كل عضو وطوله وقياسه وحالته الصحية ، وسنتأكد من تحقيق الأهداف الصحية لكل عضو.'
            ],
            'image' => 'assets/img/ser6.png',
            'price' => '0'
        ]);


        Service::create([
            'title' => ['en' => 'Personal training' , 'ar' => 'تمرين شخصي'],
            'text' => ['en' => 'Member can choose between our amazing coaches to person train her. Instructor will make sure to provide the utmost motivation and guidance to the member training her as whatever her
                body needs. The coach main goal is to assist the member step by step to her fitness goals.',
                'ar' => 'يمكن للعضو الاختيار بين مدربينا المذهلين لتدريبها شخصيا. سيحرص المدرب على توفير أقصى درجات الحافز والتوجيه للعضوة التي تقوم بتدريبها على أي حال
                 احتياجات الجسم. الهدف الرئيسي للمدرب هو مساعدة العضوة خطوة بخطوة لتحقيق أهداف اللياقة البدنية الخاصة بها.'
            ],
            'image' => 'assets/img/serr.png',
            'price' => '0'
        ]);

        Service::create([
            'title' => ['en' => 'Diastasis Recti' , 'ar' => 'انفراق المستقيم'],
            'text' => ['en' => 'Member can choose between our amazing coaches to person train her. Instructor will make sure to provide the utmost motivation and guidance to the member training her as whatever her
                body needs. The coach main goal is to assist the member step by step to her fitness goals.' ,
                'ar' => 'يمكن للعضو الاختيار بين مدربينا المذهلين لتدريبها شخصيا. سيحرص المدرب على توفير أقصى درجات الحافز والتوجيه للعضوة التي تقوم بتدريبها على أي حال
                 احتياجات الجسم. الهدف الرئيسي للمدرب هو مساعدة العضوة خطوة بخطوة لتحقيق أهداف اللياقة البدنية الخاصة بها.'
                ],
            'image' => 'assets/img/ser4.png',
            'price' => '0'
        ]);

    }
}
