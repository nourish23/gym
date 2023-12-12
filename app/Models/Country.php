<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * Class Country
 *
 * @property $id
 * @property $name
 * @property $code
 * @property $flag_url
 * @property $phone_code
 * @property $phone_length
 * @property $status
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Country extends Model
{
    use HasTranslations;

    static $rules = [
        'name' => 'required',
        'currency' => 'required',
        'phone_length' => 'required',
        'status' => 'required',
    ];

    protected $perPage = 12;
    public $translatable = ['name'];
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'currency', 'code', 'flag_url', 'phone_code', 'phone_length', 'status'];
}
