<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classes::create([
            'title' => [
                'en' => 'Zumba Class',
                'ar' => 'Zumba Class'
            ],
            'description' => [
                'en' => 'Zumba classes are great for toning muscle, as they work several different muscle groups at once. These not only elevate your heart rate and provide aerobic benefits, but they also offer anaerobic benefits, which help you maintain a healthy respiratory system. Zumba is great for anyone looking to change up their workout with some exhilarating dance moves that will make you sweat.',
                'ar' => 'Zumba classes are great for toning muscle, as they work several different muscle groups at once. These not only elevate your heart rate and provide aerobic benefits, but they also offer anaerobic benefits, which help you maintain a healthy respiratory system. Zumba is great for anyone looking to change up their workout with some exhilarating dance moves that will make you sweat.'
            ],
            'thumbnail_url' => 'https://i.pinimg.com/736x/98/91/fd/9891fdc8d6404f69a638a64e02ac89ec.jpg',
        ]);

        Classes::create([
            'title' => [
                'en' => 'MMA',
                'ar' => 'MMA'
            ],
            'description' => [
                'en' => 'MMA FET is a Fitness program combined from mixed martial arts types, where the battleship moved from cage to GX room, controlled by the beats of music that driven by a sequence of real techniques to give you fit results that you are looking for. The real fight starts with a ring, and we ring the peace with our music and beats to spread the positive energy in the GX room to get your chakras aligned towards with balance, and strength to win the fit in peace. Burn rate per hour: 500-1200 calories. Equipment needed: none.',

                'ar' => 'MMA FET is a Fitness program combined from mixed martial arts types, where the battleship moved from cage to GX room, controlled by the beats of music that driven by a sequence of real techniques to give you fit results that you are looking for. The real fight starts with a ring, and we ring the peace with our music and beats to spread the positive energy in the GX room to get your chakras aligned towards with balance, and strength to win the fit in peace. Burn rate per hour: 500-1200 calories. Equipment needed: none.'
            ],
            'thumbnail_url' => 'https://dummyimage.com/606x317/fff/aaa',
        ]);

        Classes::create([
            'title' => [
                'en' => 'Aerotensity',
                'ar' => 'كثافة الهواء'
            ],
            'description' => [
                'en' => 'AEROTENSITY is collaborating the high intensity interval exercises (glucose burn and after burn system) and low intensity exercises (direct fat burn system) and sync it with adrenalin music to boom a positives vibe. We sync the HIIT with a music to generate a new formula that can rock the class and fill up all the audiences with love, and strength. Burn rate per hour: 500-800 calories. Equipment needed: MAT.',

                'ar' => 'AEROTENSITY is collaborating the high intensity interval exercises (glucose burn and after burn system) and low intensity exercises (direct fat burn system) and sync it with adrenalin music to boom a positives vibe. We sync the HIIT with a music to generate a new formula that can rock the class and fill up all the audiences with love, and strength. Burn rate per hour: 500-800 calories. Equipment needed: MAT.'
            ],
            'thumbnail_url' => 'https://dummyimage.com/606x317/fff/aaa',
        ]);

        Classes::create([
            'title' => [
                'en' => 'Iron FET',
                'ar' => 'الحديد FET'
            ],
            'description' => [
                'en' => 'Iron FET is a weight lifting cardio planned program. Where the energy comes from the depth of your body responding the beat of the music to carry the weight on with repeat the moves scientifically for all your body muscles. When the music starts to play, the beats spreading the energy in all the surrounded atmosphere to give you the desire power, balance, and strength to rock out that muscles and drop that extra calories. Burn rate per hour: 500-700 calories. Equipment needed: 1- Free weights 2 – 5 KGs. 2- Mat',

                'ar' => 'Iron FET is a weight lifting cardio planned program. Where the energy comes from the depth of your body responding the beat of the music to carry the weight on with repeat the moves scientifically for all your body muscles. When the music starts to play, the beats spreading the energy in all the surrounded atmosphere to give you the desire power, balance, and strength to rock out that muscles and drop that extra calories. Burn rate per hour: 500-700 calories. Equipment needed: 1- Free weights 2 – 5 KGs. 2- Mat.'
            ],
            'thumbnail_url' => 'https://dummyimage.com/606x317/fff/aaa',
        ]);


        Classes::create([
            'title' => [
                'en' => 'Hipnotic',
                'ar' => 'Hipnotic'
            ],
            'description' => [
                'en' => 'Is the female soul and body workout inspired by atheistic bellydance moves to music and rhythms from all over the world. The class duration is one hour. Every song will be attracting special positive energy for the mind and body. It’s the commitment to live up to the active spirit. Burn rate per hour: 300-500 calories. Equipment needed: None.',

                'ar' => 'Is the female soul and body workout inspired by atheistic bellydance moves to music and rhythms from all over the world. The class duration is one hour. Every song will be attracting special positive energy for the mind and body. It’s the commitment to live up to the active spirit. Burn rate per hour: 300-500 calories. Equipment needed: None.'
            ],
            'thumbnail_url' => 'https://dummyimage.com/606x317/fff/aaa',

        ]);


        Classes::create([
            'title' => [
                'en' => 'Pilates\Yoga',
                'ar' => 'Pilates\Yoga'
            ],
            'description' => [
                'en' => 'Both Pilates and yoga focus on developing strength, balance, flexibility, posture, and improving breathing techniques. Yoga has a more spiritual side than Pilates due to its emphasis on unity between mind and body. Pilates also uses breathing, but its exercises focus much more on the movements that target specific parts of the body. And there is some evidence to be sure that Pilates helps relieve lower back pain. Alone they are not considered as an effective workout for losing weight, these exercises can support weight loss and give a more shaped body look, if your goal is to lose weight, and then you must combine them with other cardo exercises. Burn rate per hour: 300-500 calories. Equipment needed: Mat.',

                'ar' => 'Both Pilates and yoga focus on developing strength, balance, flexibility, posture, and improving breathing techniques. Yoga has a more spiritual side than Pilates due to its emphasis on unity between mind and body. Pilates also uses breathing, but its exercises focus much more on the movements that target specific parts of the body. And there is some evidence to be sure that Pilates helps relieve lower back pain. Alone they are not considered as an effective workout for losing weight, these exercises can support weight loss and give a more shaped body look, if your goal is to lose weight, and then you must combine them with other cardo exercises. Burn rate per hour: 300-500 calories. Equipment needed: Mat.'
            ],
            'thumbnail_url' => 'https://dummyimage.com/606x317/fff/aaa',
        ]);

        Classes::create([
            'title' => [
                'en' => 'Weight lifting',
                'ar' => 'Weight lifting'
            ],
            'description' => [
                'en' => 'Using light to heavy weights with lots of repetition gives you a full body workout. Instructors will guide you through science-backed movements and techniques that inject encouragement, motivation. Great music - helping you achieve so much more than you do yourself! You will leave class feeling challenged. A full-body weight lifting workout will burn calories, shape your whole body and strengthen it, increase core strength and improve bone health. Burn rate per hour: 400-600 calories. Equipment needed: 1- Free weights 2 – 6 KGs. 2- Bar (If available). 3- Step (If available).',

                'ar' => 'Using light to heavy weights with lots of repetition gives you a full body workout. Instructors will guide you through science-backed movements and techniques that inject encouragement, motivation. Great music - helping you achieve so much more than you do yourself! You will leave class feeling challenged. A full-body weight lifting workout will burn calories, shape your whole body and strengthen it, increase core strength and improve bone health. Burn rate per hour: 400-600 calories. Equipment needed: 1- Free weights 2 – 6 KGs. 2- Bar (If available). 3- Step (If available).'
            ],
            'thumbnail_url' => 'https://dummyimage.com/606x317/fff/aaa',
        ]);


        Classes::create([
            'title' => [
                'en' => 'Hips and abs',
                'ar' => 'Hips and abs'
            ],
            'description' => [
                'en' => 'This workout targets and strengthens Hips and Abs parts, Very intense. It attacks the stomach, hips, thighs and lower back. This type of classes are considered high-intensity class, you will see amazing results upon consistency with the workouts. Burn rate per hour: 300-500 calories. Equipment needed: 1- Free weights 2 – 6 KGs. 2- Yoga ball. 3- Resistance band',

                'ar' => 'This workout targets and strengthens Hips and Abs parts, Very intense. It attacks the stomach, hips, thighs and lower back. This type of classes are considered high-intensity class, you will see amazing results upon consistency with the workouts. Burn rate per hour: 300-500 calories. Equipment needed: 1- Free weights 2 – 6 KGs. 2- Yoga ball. 3- Resistance band'
            ],
            'thumbnail_url' => 'https://dummyimage.com/606x317/fff/aaa',
        ]);

        Classes::create([
            'title' => [
                'en' => 'Harakeh',
                'ar' => 'Harakeh'
            ],
            'description' => [
                'en' => 'Harakeh, is the first Arabic group fitness program. It aims to strengthen the heart muscle and all the muscles of the body and the respiratory system. This program is designed for all age groups and has many easy options for beginners trainees. The program contains 4 parts, they are: jump, strength, kick, dabke. Each part aims to raise the heartbeat in order to burn the largest amount of calories. Burn rate per hour: 500-1000 calories. Equipment needed: 1- Free weights 2 – 6 KGs. 2- mat',

                'ar' => 'Harakeh, is the first Arabic group fitness program. It aims to strengthen the heart muscle and all the muscles of the body and the respiratory system. This program is designed for all age groups and has many easy options for beginners trainees. The program contains 4 parts, they are: jump, strength, kick, dabke. Each part aims to raise the heartbeat in order to burn the largest amount of calories. Burn rate per hour: 500-1000 calories. Equipment needed: 1- Free weights 2 – 6 KGs. 2- mat'
            ],
            'thumbnail_url' => 'https://dummyimage.com/606x317/fff/aaa',
        ]);

        Classes::create([
            'title' => [
                'en' => 'Zumba',
                'ar' => 'Zumba'
            ],
            'description' => [
                'en' => 'Mix the low-intensity and high-intensity moves for a calorie-burning dancing fitness party. A comprehensive workout, combining all the elements of fitness - cardio, muscle conditioning, balance and flexibility, boosted energy, and an impressive dose of awsomness every time you leave class. Burn rate per hour: 300-600 calories. Equipment needed: none.',

                'ar' => 'Mix the low-intensity and high-intensity moves for a calorie-burning dancing fitness party. A comprehensive workout, combining all the elements of fitness - cardio, muscle conditioning, balance and flexibility, boosted energy, and an impressive dose of awsomness every time you leave class. Burn rate per hour: 300-600 calories. Equipment needed: none.'
            ],
            'thumbnail_url' => 'https://dummyimage.com/606x317/fff/aaa',
        ]);
    }
}
