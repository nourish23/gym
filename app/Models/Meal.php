<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * Class Meal
 *
 * @property $id
 * @property $title
 * @property $time
 * @property $week_id
 * @property $status
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property DataMeal[] $dataMeals
 * @property Week $week
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Meal extends Model
{
    use  HasTranslations; 

    static $rules = [
		'title' => 'required',
		'time' => 'required',
		'week_id' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 12;
    public $translatable = ['title' ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','time','week_id','status' , 'user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dataMeals()
    {
        return $this->hasMany('App\Models\DataMeal');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function week()
    {
        return $this->belongsTo('App\Models\Week');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
