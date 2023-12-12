<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Facades\Schema;

class blogSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Post::truncate();
        Schema::enableForeignKeyConstraints();
        Post::create([
            'title' =>[
                      'en' => 'Sporting News',
                      'ar' => 'أخبار رياضية '
                   ], 
            'seo_meta_title' =>  [
                      'en' => 'Nutritionist',
                      'ar' => 'أخصائية تغذية انسان و حميات '
                   ],
            'description' =>  [
                      'en' => 'Frequently updated and covers sports ranging from football, basketball, baseball, and more. Fantasy and betting also included. Offers sports news for four other countries too, such as Canada and China.',
                      'ar' => "يتم تحديثه بشكل متكرر ويغطي الرياضات التي تتراوح بين كرة القدم وكرة السلة والبيسبول والمزيد. وشملت أيضا الخيال والمراهنة. يقدم الأخبار الرياضية لأربع دول أخرى أيضًا ، مثل كندا والصين."
                   ],
            'image' => 'https://www.online-image-editor.com/styles/2019/images/power_girl.png',
            'seo_meta_keywords' => '',
            'seo_meta_text' => '',
            'status' => '1'
        ]);


        Post::create([
            'title' =>[
                      'en' => 'Sporting News',
                      'ar' => 'أخبار رياضية '
                   ], 
            'seo_meta_title' =>  [
                      'en' => 'Nutritionist',
                      'ar' => 'أخصائية تغذية انسان و حميات '
                   ],
            'description' =>  [
                      'en' => 'Frequently updated and covers sports ranging from football, basketball, baseball, and more. Fantasy and betting also included. Offers sports news for four other countries too, such as Canada and China.',
                      'ar' => "يتم تحديثه بشكل متكرر ويغطي الرياضات التي تتراوح بين كرة القدم وكرة السلة والبيسبول والمزيد. وشملت أيضا الخيال والمراهنة. يقدم الأخبار الرياضية لأربع دول أخرى أيضًا ، مثل كندا والصين."
                   ],
            'image' => 'https://www.online-image-editor.com/styles/2019/images/power_girl.png',
            'seo_meta_keywords' => '',
            'seo_meta_text' => '',
            'status' => '1'
        ]);



        Post::create([
            'title' =>[
                      'en' => 'FanSided',
                      'ar' => 'أخبار رياضية '
                   ], 
            'seo_meta_title' =>  [
                      'en' => 'Nutritionist',
                      'ar' => 'أخصائية تغذية انسان و حميات '
                   ],
            'description' =>  [
                      'en' => 'A sports news site focusing on sports, sport fandoms, entertainment, and lifestyle pieces. It’s family owned and provides editorial content for all things sports related, such as football or racing.',
                      'ar' => "يتم تحديثه بشكل متكرر ويغطي الرياضات التي تتراوح بين كرة القدم وكرة السلة والبيسبول والمزيد. وشملت أيضا الخيال والمراهنة. يقدم الأخبار الرياضية لأربع دول أخرى أيضًا ، مثل كندا والصين."
                   ],
            'image' => 'https://www.online-image-editor.com/styles/2019/images/power_girl.png',
            'seo_meta_keywords' => '',
            'seo_meta_text' => '',
            'status' => '1'
        ]);

       
    }
}
