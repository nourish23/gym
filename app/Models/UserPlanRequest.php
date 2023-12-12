<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserPlanRequest
 *
 * @property $id
 * @property $user_id
 * @property $plan_id
 * @property $notes
 * @property $created_at
 * @property $updated_at
 *
 * @property Plan $plan
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class UserPlanRequest extends Model
{
    
    static $rules = [
		'user_id' => 'required',
		'plan_id' => 'required',
    ];

    protected $perPage = 12;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','plan_id','notes'];


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
    

}
