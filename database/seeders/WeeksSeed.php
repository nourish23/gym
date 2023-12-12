<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Week;
use App\Models\Meal;
use App\Models\DataMeal;
use App\Models\Day;
use Illuminate\Support\Facades\Schema;

class WeeksSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DataMeal::truncate();
        Meal::truncate();
        Week::truncate();
        Schema::enableForeignKeyConstraints();
        
        Week::factory()->count(156 )->create();
        $week1 = Week::find(1);
        $week2 = Week::find(2);
        
        $days = Day::where('status', '1')->get();

        $meal1 = Meal::create([
            'title' => 'Early Morning',
            'time' => '7:00 AM',
            'week_id' => $week1->id,
            'user_id' => '1',
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hot cuming cup with mint',
            'day_id' => $days->where('day', '1')->first()->id,
            'meal_id' => $meal1->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hot cuming cup with mint',
            'day_id' => $days->where('day', '2')->first()->id,
            'meal_id' => $meal1->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hot cuming cup with mint',
            'day_id' => $days->where('day', '3')->first()->id,
            'meal_id' => $meal1->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hot cuming cup with mint',
            'day_id' => $days->where('day', '4')->first()->id,
            'meal_id' => $meal1->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hot cuming cup with mint',
            'day_id' => $days->where('day', '5')->first()->id,
            'meal_id' => $meal1->id,
            'status' => '1'
        ]);


        DataMeal::create([
            'body' => 'Hot cuming cup with mint',
            'day_id' => $days->where('day', '6')->first()->id,
            'meal_id' => $meal1->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hot cuming cup with mint',
            'day_id' => $days->where('day', '7')->first()->id,
            'meal_id' => $meal1->id,
            'status' => '1'
        ]);

        $meal2 = Meal::create([
            'title' => 'Breakfast',
            'time' => '9:00 AM',
            'week_id' => $week1->id,
            'user_id' => '1',
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Half avocado <br/> 1 cup milk <br/> 2pc toast <br/> 1 spoon yogurt',
            'day_id' => $days->where('day', '1')->first()->id,
            'meal_id' => $meal2->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Half avocado <br/> 1 cup milk <br/> 2pc toast <br/> 1 spoon yogurt',
            'day_id' => $days->where('day', '2')->first()->id,
            'meal_id' => $meal2->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Half avocado <br/> 1 cup milk <br/> 2pc toast <br/> 1 spoon yogurt',
            'day_id' => $days->where('day', '3')->first()->id,
            'meal_id' => $meal2->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Half avocado <br/> 1 cup milk <br/> 2pc toast <br/> 1 spoon yogurt',
            'day_id' => $days->where('day', '4')->first()->id,
            'meal_id' => $meal2->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Half avocado <br/> 1 cup milk <br/> 2pc toast <br/> 1 spoon yogurt',
            'day_id' => $days->where('day', '5')->first()->id,
            'meal_id' => $meal2->id,
            'status' => '1'
        ]);


        DataMeal::create([
            'body' => 'Half avocado <br/> 1 cup milk <br/> 2pc toast <br/> 1 spoon yogurt',
            'day_id' => $days->where('day', '6')->first()->id,
            'meal_id' => $meal1->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Half avocado <br/> 1 cup milk <br/> 2pc toast <br/> 1 spoon yogurt',
            'day_id' => $days->where('day', '7')->first()->id,
            'meal_id' => $meal1->id,
            'status' => '1'
        ]);

        $meal3 = Meal::create([
            'title' => 'Lunch',
            'time' => '2:00 PM',
            'week_id' => $week1->id,
            'user_id' => '1',
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => '2 cup spinach <br/> 3/4 cup rice',
            'day_id' => $days->where('day', '1')->first()->id,
            'meal_id' => $meal3->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => '2 cup spinach <br/> 3/4 cup rice',
            'day_id' => $days->where('day', '2')->first()->id,
            'meal_id' => $meal3->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => '2 cup spinach <br/> 3/4 cup rice',
            'day_id' => $days->where('day', '3')->first()->id,
            'meal_id' => $meal3->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => '2 cup spinach <br/> 3/4 cup rice',
            'day_id' => $days->where('day', '4')->first()->id,
            'meal_id' => $meal3->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => '2 cup spinach <br/> 3/4 cup rice',
            'day_id' => $days->where('day', '5')->first()->id,
            'meal_id' => $meal3->id,
            'status' => '1'
        ]);


        DataMeal::create([
            'body' => '2 cup spinach <br/> 3/4 cup rice',
            'day_id' => $days->where('day', '6')->first()->id,
            'meal_id' => $meal3->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => '2 cup spinach <br/> 3/4 cup rice',
            'day_id' => $days->where('day', '7')->first()->id,
            'meal_id' => $meal3->id,
            'status' => '1'
        ]);

        $meal4 = Meal::create([
            'title' => 'Snack',
            'time' => '4:00 PM',
            'week_id' => $week1->id,
            'user_id' => '1',
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hulf cup nuts <br/> 1 apple',
            'day_id' => $days->where('day', '1')->first()->id,
            'meal_id' => $meal4->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hulf cup nuts <br/> 1 apple',
            'day_id' => $days->where('day', '2')->first()->id,
            'meal_id' => $meal4->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hulf cup nuts <br/> 1 apple',
            'day_id' => $days->where('day', '3')->first()->id,
            'meal_id' => $meal4->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hulf cup nuts <br/> 1 apple',
            'day_id' => $days->where('day', '4')->first()->id,
            'meal_id' => $meal4->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hulf cup nuts <br/> 1 apple',
            'day_id' => $days->where('day', '5')->first()->id,
            'meal_id' => $meal4->id,
            'status' => '1'
        ]);


        DataMeal::create([
            'body' => 'Hulf cup nuts <br/> 1 apple',
            'day_id' => $days->where('day', '6')->first()->id,
            'meal_id' => $meal4->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hulf cup nuts <br/> 1 apple',
            'day_id' => $days->where('day', '7')->first()->id,
            'meal_id' => $meal4->id,
            'status' => '1'
        ]);

        $meal5 = Meal::create([
            'title' => 'Light Dineer',
            'time' => '7:00 PM',
            'week_id' => $week1->id,
            'user_id' => '1',
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Yogurt <br/> 1 cup green tea with lemon',
            'day_id' => $days->where('day', '1')->first()->id,
            'meal_id' => $meal5->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Yogurt <br/> 1 cup green tea with lemon',
            'day_id' => $days->where('day', '2')->first()->id,
            'meal_id' => $meal5->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Yogurt <br/> 1 cup green tea with lemon',
            'day_id' => $days->where('day', '3')->first()->id,
            'meal_id' => $meal5->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Yogurt <br/> 1 cup green tea with lemon',
            'day_id' => $days->where('day', '4')->first()->id,
            'meal_id' => $meal5->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Yogurt <br/> 1 cup green tea with lemon',
            'day_id' => $days->where('day', '5')->first()->id,
            'meal_id' => $meal5->id,
            'status' => '1'
        ]);


        DataMeal::create([
            'body' => 'Yogurt <br/> 1 cup green tea with lemon',
            'day_id' => $days->where('day', '6')->first()->id,
            'meal_id' => $meal5->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Yogurt <br/> 1 cup green tea with lemon',
            'day_id' => $days->where('day', '7')->first()->id,
            'meal_id' => $meal5->id,
            'status' => '1'
        ]);


        // ==========================================
        $meal1 = Meal::create([
            'title' => 'Early Morning',
            'time' => '7:00 AM',
            'week_id' => $week2->id,
            'user_id' => '1',
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hot cuming cup with mint',
            'day_id' => $days->where('day', '1')->first()->id,
            'meal_id' => $meal1->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hot cuming cup with mint',
            'day_id' => $days->where('day', '2')->first()->id,
            'meal_id' => $meal1->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hot cuming cup with mint',
            'day_id' => $days->where('day', '3')->first()->id,
            'meal_id' => $meal1->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hot cuming cup with mint',
            'day_id' => $days->where('day', '4')->first()->id,
            'meal_id' => $meal1->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hot cuming cup with mint',
            'day_id' => $days->where('day', '5')->first()->id,
            'meal_id' => $meal1->id,
            'status' => '1'
        ]);


        DataMeal::create([
            'body' => 'Hot cuming cup with mint',
            'day_id' => $days->where('day', '6')->first()->id,
            'meal_id' => $meal1->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hot cuming cup with mint',
            'day_id' => $days->where('day', '7')->first()->id,
            'meal_id' => $meal1->id,
            'status' => '1'
        ]);

        $meal2 = Meal::create([
            'title' => 'Breakfast',
            'time' => '9:00 AM',
            'week_id' => $week2->id,
            'user_id' => '1',
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Half avocado <br/> 1 cup milk <br/> 2pc toast <br/> 1 spoon yogurt',
            'day_id' => $days->where('day', '1')->first()->id,
            'meal_id' => $meal2->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Half avocado <br/> 1 cup milk <br/> 2pc toast <br/> 1 spoon yogurt',
            'day_id' => $days->where('day', '2')->first()->id,
            'meal_id' => $meal2->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Half avocado <br/> 1 cup milk <br/> 2pc toast <br/> 1 spoon yogurt',
            'day_id' => $days->where('day', '3')->first()->id,
            'meal_id' => $meal2->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Half avocado <br/> 1 cup milk <br/> 2pc toast <br/> 1 spoon yogurt',
            'day_id' => $days->where('day', '4')->first()->id,
            'meal_id' => $meal2->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Half avocado <br/> 1 cup milk <br/> 2pc toast <br/> 1 spoon yogurt',
            'day_id' => $days->where('day', '5')->first()->id,
            'meal_id' => $meal2->id,
            'status' => '1'
        ]);


        DataMeal::create([
            'body' => 'Half avocado <br/> 1 cup milk <br/> 2pc toast <br/> 1 spoon yogurt',
            'day_id' => $days->where('day', '6')->first()->id,
            'meal_id' => $meal1->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Half avocado <br/> 1 cup milk <br/> 2pc toast <br/> 1 spoon yogurt',
            'day_id' => $days->where('day', '7')->first()->id,
            'meal_id' => $meal1->id,
            'status' => '1'
        ]);

        $meal3 = Meal::create([
            'title' => 'Lunch',
            'time' => '2:00 PM',
            'week_id' => $week2->id,
            'user_id' => '1',
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => '2 cup spinach <br/> 3/4 cup rice',
            'day_id' => $days->where('day', '1')->first()->id,
            'meal_id' => $meal3->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => '2 cup spinach <br/> 3/4 cup rice',
            'day_id' => $days->where('day', '2')->first()->id,
            'meal_id' => $meal3->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => '2 cup spinach <br/> 3/4 cup rice',
            'day_id' => $days->where('day', '3')->first()->id,
            'meal_id' => $meal3->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => '2 cup spinach <br/> 3/4 cup rice',
            'day_id' => $days->where('day', '4')->first()->id,
            'meal_id' => $meal3->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => '2 cup spinach <br/> 3/4 cup rice',
            'day_id' => $days->where('day', '5')->first()->id,
            'meal_id' => $meal3->id,
            'status' => '1'
        ]);


        DataMeal::create([
            'body' => '2 cup spinach <br/> 3/4 cup rice',
            'day_id' => $days->where('day', '6')->first()->id,
            'meal_id' => $meal3->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => '2 cup spinach <br/> 3/4 cup rice',
            'day_id' => $days->where('day', '7')->first()->id,
            'meal_id' => $meal3->id,
            'status' => '1'
        ]);

        $meal4 = Meal::create([
            'title' => 'Snack',
            'time' => '4:00 PM',
            'week_id' => $week2->id,
            'user_id' => '1',
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hulf cup nuts <br/> 1 apple',
            'day_id' => $days->where('day', '1')->first()->id,
            'meal_id' => $meal4->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hulf cup nuts <br/> 1 apple',
            'day_id' => $days->where('day', '2')->first()->id,
            'meal_id' => $meal4->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hulf cup nuts <br/> 1 apple',
            'day_id' => $days->where('day', '3')->first()->id,
            'meal_id' => $meal4->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hulf cup nuts <br/> 1 apple',
            'day_id' => $days->where('day', '4')->first()->id,
            'meal_id' => $meal4->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hulf cup nuts <br/> 1 apple',
            'day_id' => $days->where('day', '5')->first()->id,
            'meal_id' => $meal4->id,
            'status' => '1'
        ]);


        DataMeal::create([
            'body' => 'Hulf cup nuts <br/> 1 apple',
            'day_id' => $days->where('day', '6')->first()->id,
            'meal_id' => $meal4->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Hulf cup nuts <br/> 1 apple',
            'day_id' => $days->where('day', '7')->first()->id,
            'meal_id' => $meal4->id,
            'status' => '1'
        ]);

        $meal5 = Meal::create([
            'title' => 'Light Dineer',
            'time' => '7:00 PM',
            'week_id' => $week2->id,
            'user_id' => '1',
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Yogurt <br/> 1 cup green tea with lemon',
            'day_id' => $days->where('day', '1')->first()->id,
            'meal_id' => $meal5->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Yogurt <br/> 1 cup green tea with lemon',
            'day_id' => $days->where('day', '2')->first()->id,
            'meal_id' => $meal5->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Yogurt <br/> 1 cup green tea with lemon',
            'day_id' => $days->where('day', '3')->first()->id,
            'meal_id' => $meal5->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Yogurt <br/> 1 cup green tea with lemon',
            'day_id' => $days->where('day', '4')->first()->id,
            'meal_id' => $meal5->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Yogurt <br/> 1 cup green tea with lemon',
            'day_id' => $days->where('day', '5')->first()->id,
            'meal_id' => $meal5->id,
            'status' => '1'
        ]);


        DataMeal::create([
            'body' => 'Yogurt <br/> 1 cup green tea with lemon',
            'day_id' => $days->where('day', '6')->first()->id,
            'meal_id' => $meal5->id,
            'status' => '1'
        ]);

        DataMeal::create([
            'body' => 'Yogurt <br/> 1 cup green tea with lemon',
            'day_id' => $days->where('day', '7')->first()->id,
            'meal_id' => $meal5->id,
            'status' => '1'
        ]);
    }
}
