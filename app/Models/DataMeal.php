<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * Class DataMeal
 *
 * @property $id
 * @property $body
 * @property $day_id
 * @property $meal_id
 * @property $status
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Day $day
 * @property Meal $meal
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DataMeal extends Model
{
    // use  HasTranslations; 

    static $rules = [
		'body' => 'required',
		'day_id' => 'required',
		'meal_id' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 12;
    protected $hidden = ['created_at','updated_at'];
    // public $translatable = ['body' ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['body','day_id','meal_id','status'];


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
    public function meal()
    {
        return $this->belongsTo('App\Models\Meal', "meal_id");
    }
    

}
