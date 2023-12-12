<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

/**
 * Class Plan
 *
 * @property $id
 * @property $title
 * @property $image
 * @property $description
 * @property $is_free
 * @property $price
 * @property $period
 * @property $category_id
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Category $category
 * @property NutritionPlan[] $nutritionPlans
 * @property User[] $users
 * @property UserPlanRequest[] $userPlanRequests
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Plan extends Model
{
    use SoftDeletes, HasTranslations;

    static $rules = [
        'title' => 'required',
        'is_free' => 'required',
        'price' => 'required',
        'period' => 'required',
        'old_price'=>''
    ];

    protected $perPage = 12;
    public $translatable = ['title', 'description'];
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'image', 'description', 'is_free', 'price', 'period', 'category_id','old_price'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nutritionPlans()
    {
        return $this->hasMany('App\Models\NutritionPlan', 'plan_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'plan_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userPlanRequests()
    {
        return $this->hasMany('App\Models\UserPlanRequest', 'plan_id', 'id');
    }
}
