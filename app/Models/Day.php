<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 
/**
 * Class Day
 *
 * @property $id
 * @property $name
 * @property $day
 * @property $status
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property ManageNotification[] $manageNotifications
 * @property NutritionPlan[] $nutritionPlans
 * @property ScheduledClass[] $scheduledClasses
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Day extends Model
{
    static $rules = [
		'name' => 'required',
		'day' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 12;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','day','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function manageNotifications()
    {
        return $this->hasMany('App\Models\ManageNotification', 'day_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nutritionPlans()
    {
        return $this->hasMany('App\Models\NutritionPlan', 'day_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scheduledClasses()
    {
        return $this->hasMany('App\Models\ScheduledClass', 'day_id', 'id');
    }
    

}
