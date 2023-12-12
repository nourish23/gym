<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 
/**
 * Class BodyMeasurement
 *
 * @property $id
 * @property $weight
 * @property $height
 * @property $chest
 * @property $waist
 * @property $abs
 * @property $hips
 * @property $left_thigh
 * @property $right_thigh
 * @property $left_arm
 * @property $right_arm
 * @property $deleted_at
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property NutritionPlan[] $nutritionPlans
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class BodyMeasurement extends Model
{

    static $rules = [
        'weight' => 'required',
        'height' => 'required',
        'chest' => 'nullable',
        'waist' => 'nullable',
        'abs' => 'nullable',
        'hips' => 'nullable',
        'left_thigh' => 'nullable',
        'right_thigh' => 'nullable',
        'left_arm' => 'nullable',
        'right_arm' => 'nullable',
        'created_at' => 'nullable'
    ];

    protected $perPage = 12;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['weight','height','chest','waist','abs','hips','left_thigh','right_thigh','left_arm','right_arm','user_id' , 'created_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nutritionPlans()
    {
        return $this->hasMany('App\Models\NutritionPlan', 'body_measurement_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User',   'user_id');
    }
    

}
