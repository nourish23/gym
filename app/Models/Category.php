<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Spatie\Translatable\HasTranslations;
/**
 * Class Category
 *
 * @property $id
 * @property $title
 * @property $description
 * @property $status
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Category extends Model
{
    use  HasTranslations;

    static $rules = [
		'title' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 12;
    public $translatable = ['title'  , 'description'];
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','status'];



}
