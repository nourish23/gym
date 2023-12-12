<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;
use Illuminate\Support\Facades\Schema;

class SliderSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Slider::truncate();
        Schema::enableForeignKeyConstraints();
        Slider::create([
            'title' => [
                      'en' => 'Your Home, Is Your Gym Now!',
                      'ar' => 'منزلك ، هو الصالة الرياضية الخاصة بك الآن!'
                   ],
                   
            'text' => [ 'en' => 'Online fitness gym, was founded especially to serve ladies all over the world and from all age group to talk their first step towards healthy and fit lifestyle. We provide online live workout classes in groups and individually and online nutrition plans. This way we can help ladies reach their fitness goals no matter where they are. Our member will also get online nutrition plans as per personal needs, and their health situation (this service only is available for males as well)' ,
                'ar' => 'تم إنشاء صالة اللياقة البدنية على الإنترنت خصيصًا لخدمة السيدات في جميع أنحاء العالم ومن جميع الفئات العمرية للتحدث عن خطوتهم الأولى نحو نمط حياة صحي ومناسب. نحن نقدم دروس تمرين مباشرة عبر الإنترنت في مجموعات وخطط تغذية فردية وعبر الإنترنت. بهذه الطريقة يمكننا مساعدة السيدات على تحقيق أهداف اللياقة البدنية بغض النظر عن مكان وجودهن. سيحصل أعضاؤنا أيضًا على خطط تغذية عبر الإنترنت وفقًا للاحتياجات الشخصية وحالتهم الصحية (هذه الخدمة متاحة فقط للذكور أيضًا)'
                ],
            'image_url' => 'assets/img/sec11.png',
            'is_clickable' => '1',
            'target_blank' => '0',
            'url' => 'https://youtu.be/LXb3EKWsInQ',
            'status' => '1'
        ]);

                 
             

    }
}
