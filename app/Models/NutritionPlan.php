<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Spatie\Translatable\HasTranslations;

/**
 * Class NutritionPlan
 *
 * @property $id
 * @property $user_id
 * @property $body_measurement_id
 * @property $plan_id
 * @property $day_id
 * @property $meal
 * @property $time_of_meal
 * @property $status
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property BodyMeasurement $bodyMeasurement
 * @property Day $day
 * @property Plan $plan
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class NutritionPlan extends Model
{
    use HasTranslations;

    static $rules = [
		'user_id' => 'required',
		'body_measurement_id' => 'required',
		'plan_id' => '',
		'day_id' => 'required',
		'meal_id' => 'required',
		'time_of_meal' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 12;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','body_measurement_id','plan_id','day_id','meal_id','time_of_meal','status'];
    public $translatable = [  ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bodyMeasurement()
    {
        return $this->hasOne('App\Models\BodyMeasurement', 'id', 'body_measurement_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function day()
    {
        return $this->hasOne('App\Models\Day', 'id', 'day_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function plan()
    {
        return $this->hasOne('App\Models\Plan', 'id', 'plan_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
    public function meal()
    {
        return $this->hasOne('App\Models\Meal', 'id', 'meal_id');
    }
}
