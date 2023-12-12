<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Spatie\Translatable\HasTranslations;

/**
 * Class EmailTemplate
 *
 * @property $id
 * @property $title
 * @property $text
 * @property $status
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property ManageNotification[] $manageNotifications
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EmailTemplate extends Model
{
  use HasTranslations;

  protected $perPage = 12;
  public $translatable = ['title', 'text'];
  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['user_id', 'subject', 'content'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function manageNotifications()
  {
    return $this->hasMany('App\Models\ManageNotification', 'email_template_id', 'id');
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
