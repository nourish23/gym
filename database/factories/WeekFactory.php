<?php

namespace Database\Factories;

use App\Models\Week;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Week>
 */
class WeekFactory extends Factory
{
    protected $model = Week::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $index = 1;

        return [
            'title' => 'Week ' . $index++,
            'status' => 1,
        ];
    }
}
