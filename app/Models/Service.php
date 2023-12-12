<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Spatie\Translatable\HasTranslations;

/**
 * Class Service
 *
 * @property $id
 * @property $title
 * @property $image
 * @property $text
 * @property $price
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property PlansService[] $plansServices
 * @property UserService[] $userServices
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Service extends Model
{
    use  HasTranslations;

    static $rules = [
		'title' => 'required',
		'price' => 'required',
    ];

    protected $perPage = 12;
    public $translatable = ['title' , 'text'];
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','image','text','price','category_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plansServices()
    {
        return $this->hasMany('App\Models\PlansService', 'service_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userServices()
    {
        return $this->hasMany('App\Models\UserService', 'service_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
    
    

}
