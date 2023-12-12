<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * Class Slider
 *
 * @property $id
 * @property $title
 * @property $image_url
 * @property $text
 * @property $is_clickable
 * @property $target_blank
 * @property $url
 * @property $status
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Slider extends Model
{
  use HasTranslations;

  static $rules = [
    'title' => 'required',
    'is_clickable' => 'required',
    'target_blank' => 'required',
    'image_url' => "image|mimes:jpeg,jpg,png,gif"
  ];

  protected $perPage = 12;
  public $translatable = ['title', 'text'];
  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['title', 'image_url', 'text', 'is_clickable', 'target_blank', 'url', 'status'];
}
