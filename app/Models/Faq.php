<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Spatie\Translatable\HasTranslations;

/**
 * Class Faq
 *
 * @property $id
 * @property $question
 * @property $answer
 * @property $status
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Faq extends Model
{
    use  HasTranslations;

    static $rules = [
		'question' => 'required',
		'answer' => 'required',
		'status' => '',
    ];

    protected $perPage = 12;
    public $translatable = ['question' , 'answer'];
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['question','answer','status'];



}
