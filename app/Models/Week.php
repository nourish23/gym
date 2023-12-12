<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Week
 *
 * @property $id
 * @property $title
 * @property $status
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Meal[] $meals
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Week extends Model
{
  use HasFactory;

  static $rules = [
    'title' => 'required',
    'status' => 'required',
  ];

  protected $perPage = 12;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['title', 'status'];
  protected $hidden = ['created_at', 'updated_at'];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function meals()
  {
    return $this->hasMany('App\Models\Meal');
  }
}
