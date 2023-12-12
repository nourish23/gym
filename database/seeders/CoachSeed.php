<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Coach;
use Illuminate\Support\Facades\Schema;

class CoachSeed extends Seeder
{
       /**
        * Run the database seeds.
        *
        * @return void
        */
       public function run()
       {
              Schema::disableForeignKeyConstraints();
              Coach::truncate();
              Schema::enableForeignKeyConstraints();
              Coach::create([
                     'name' => [
                            'en' => 'Farah Shaqlous',
                            'ar' => 'فرح شقلوص'
                     ],
                     'brief' => [
                            'en' => 'Personal trainer',
                            'ar' => 'مدربة رياضة شخصية معتمدة'
                     ],
                     'description' => [
                            'en' => 'Specified in training for Health and Fitness/Advanced weight training and Sports nutrition.',
                            'ar' => 'متخصصة بالتمارين الرياضية (الكارديو)
/تمارين المقاومة و الأثقال/ التغذية الرياضية'
                     ],
                     'image_url' => 'assets/img/Farah.png',
                     'facebook_url' => '',
                     'instagram_url' => '',
                     'linked_url' => '',
              ]);

              Coach::create([
                     'name' => [
                            'en' => 'Maysaa Alsayed',
                            'ar' => 'ميساء السيد '
                     ],
                     'brief' =>  [
                            'en' => 'Nutritionist',
                            'ar' => 'أخصائية تغذية انسان و حميات '
                     ],
                     'description' =>  [
                            'en' => 'Specialized in athletes nutrition, weight loss diets , weight gain diets, therapeutic diets.',
                            'ar' => 'متخصصة في تغذية الرياضيين ، حميات نزول الوزن ، حميات زيادة الوزن ، و الحميات العلاجية'
                     ],
                     'image_url' => 'assets/img/Maysa.png',
                     'facebook_url' => '',
                     'instagram_url' => '',
                     'linked_url' => '',
              ]);

              Coach::create([
                     'name' => [
                            'en' => 'Rana Ghannam',
                            'ar' => 'رنا غنام'
                     ],
                     'brief' => [
                            'en' => 'Fitness trainer',
                            'ar' => "مدربة لياقة بدنية"
                     ],
                     'description' =>  [
                            'en' => 'Fitness trainer, Group Exercises , cardio and weight training',
                            'ar' => "مدربة لياقة بدنية، حصص جماعية، تمارين القلب ورفع الأثقال "
                     ],
                     'image_url' => 'assets/img/Rana.png',
                     'facebook_url' => '',
                     'instagram_url' => '',
                     'linked_url' => '',
              ]);

              Coach::create([
                     'name' => [
                            'en' => 'Huda Al Bahri',
                            'ar' => 'هدى البحري '
                     ],
                     'brief' => [
                            'en' => 'Zumba',
                            'ar' => "الزومبا  "
                     ],
                     'description' =>  [
                            'en' => 'Former Zumba Marketing Agent / Jordan, Merash Master Trainer',
                            'ar' => "وكيلة الزومبا للاردن سابقًا و ماستر كوتش ميراش "
                     ],
                     'image_url' => 'assets/img/Huda.png',
                     'facebook_url' => '',
                     'instagram_url' => '',
                     'linked_url' => '',
              ]);

              Coach::create([
                     'name' => [
                            'en' => 'Mariam Salous',
                            'ar' => 'مريم سلوس'
                     ],
                     'brief' => [
                            'en' => 'Certified group exercise trainer',
                            'ar' => "مدربة تمارين جماعية معتمدة"
                     ],
                     'description' =>  [
                            'en' => 'Specialized in yoga and Pilates, music kick boxing, core, HIIT training',
                            'ar' => "متخصصة في اليوجا والبيلاتس، تدريبات الملاكمة مع الموسيقى، تدريب HIIT"
                     ],
                     'image_url' => 'assets/img/Mariam.png',
                     'facebook_url' => '',
                     'instagram_url' => '',
                     'linked_url' => '',
              ]);
       }
}
