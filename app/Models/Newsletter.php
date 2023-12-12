<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 
/**
 * Class Newsletter
 *
 * @property $id
 * @property $email
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Newsletter extends Model
{
    static $rules = [
		'email' => 'required',
    ];

    protected $perPage = 12;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['email'];



}
