<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Spatie\Translatable\HasTranslations;

/**
 * Class Coach
 *
 * @property $id
 * @property $name
 * @property $brief
 * @property $description
 * @property $image_url
 * @property $facebook_url
 * @property $instagram_url
 * @property $linked_url
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Coach extends Model
{
  use HasTranslations;

  static $rules = [
    'name' => 'required',
    'brief' => 'required',
    'description' => 'required',
    'image_url' => '',
    'facebook_url' => '',
    'instagram_url' => '',
    'linked_url' => '',
  ];

  protected $perPage = 12;
  public $translatable = ['name', 'brief', 'description'];
  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'brief', 'description', 'image_url', 'facebook_url', 'instagram_url', 'linked_url'];
}
