<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserService
 *
 * @property $id
 * @property $user_id
 * @property $service_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Service $service
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class UserService extends Model
{
    
    static $rules = [
		'user_id' => 'required',
		'service_id' => 'required',
    ];

    protected $perPage = 12;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','service_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function service()
    {
        return $this->hasOne('App\Models\Service', 'id', 'service_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
