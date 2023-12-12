<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory,  HasTranslations;

    static $rules = [
        'title' => 'required',
        "description" => "",
        "thumbnail_url" => "",
    ];

    protected $perPage = 12;
    public $translatable = ['title', 'description'];
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'thumbnail_url',
        'description'
    ];

    protected $cast = [
        'title' => "array"
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function PlanClass()
    {
        return $this->hasMany('App\Models\PlanClass', "class_id");
    }
}
