<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * Class Post
 *
 * @property $id
 * @property $title
 * @property $seo_meta_title
 * @property $seo_meta_text
 * @property $seo_meta_keywords
 * @property $image
 * @property $description
 * @property $status
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Post extends Model
{
  use  HasTranslations;

  static $rules = [
    'title' => 'required',
    'description' => 'required',
    'seo_meta_title' => '',
    'seo_meta_text' => '',
    'seo_meta_keywords' => '',
  ];

  protected $perPage = 12;
  public $translatable = ['title', 'seo_meta_title', 'seo_meta_text', 'seo_meta_keywords', 'description'];
  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['title', 'seo_meta_title', 'seo_meta_text', 'seo_meta_keywords', 'image', 'description', 'status'];
}
