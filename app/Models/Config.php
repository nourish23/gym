<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Config
 *
 * @property $id
 * @property $title
 * @property $type
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Config extends Model
{
    use SoftDeletes;

    static $rules = [
		'title' => 'required',
		'type' => 'required',
    ];

    protected $perPage = 12;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','type','value','icon'];
    // type = 'contact','work_times','socialmedia','app_social','app_android_v','app_ios_v'


}
