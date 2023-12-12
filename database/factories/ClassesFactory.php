<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classes>
 */
class ClassesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => [
                'en' => 'Zumba Class',
                'ar' => 'Zumba Class'
            ],
            'description' => [
                'en' => 'Zumba classes are great for toning muscle, as they work several different muscle groups at once. These not only elevate your heart rate and provide aerobic benefits, but they also offer anaerobic benefits, which help you maintain a healthy respiratory system. Zumba is great for anyone looking to change up their workout with some exhilarating dance moves that will make you sweat.',
                'ar' => 'Zumba classes are great for toning muscle, as they work several different muscle groups at once. These not only elevate your heart rate and provide aerobic benefits, but they also offer anaerobic benefits, which help you maintain a healthy respiratory system. Zumba is great for anyone looking to change up their workout with some exhilarating dance moves that will make you sweat.'
            ],
            'thumbnail_url' => 'https://i.pinimg.com/736x/98/91/fd/9891fdc8d6404f69a638a64e02ac89ec.jpg',
        ];
    }
}
