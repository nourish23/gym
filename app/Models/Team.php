<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 
/**
 * Class Team
 *
 * @property $id
 * @property $title
 * @property $image
 * @property $text
 * @property $position
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Team extends Model
{
    static $rules = [
		'title' => 'required',
    ];

    protected $perPage = 12;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','image','text','position'];



}
