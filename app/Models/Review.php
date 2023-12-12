<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Spatie\Translatable\HasTranslations;

/**
 * Class Review
 *
 * @property $id
 * @property $name
 * @property $image
 * @property $text
 * @property $status
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Review extends Model
{
  use  HasTranslations;

  static $rules = [
    'name' => 'required',
    'status' => 'required',
  ];

  protected $perPage = 12;
  public $translatable = ['text', 'name'];
  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'image', 'text', 'status'];
}
