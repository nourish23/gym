<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Spatie\Translatable\HasTranslations;

/**
 * Class ManageNotification
 *
 * @property $id
 * @property $title
 * @property $text
 * @property $before_days_num
 * @property $type
 * @property $day_id
 * @property $email_template_id
 * @property $status
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Day $day
 * @property EmailTemplate $emailTemplate
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ManageNotification extends Model
{
    use  HasTranslations;

    static $rules = [
		'title' => 'required',
		'text' => 'required',
		'before_days_num' => 'required',
		'type' => 'required',
		'day_id' => 'required',
		'email_template_id' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 12;
    public $translatable = ['title' , 'text'];
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','text','before_days_num','type','day_id','email_template_id','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function day()
    {
        return $this->hasOne('App\Models\Day', 'id', 'day_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function emailTemplate()
    {
        return $this->hasOne('App\Models\EmailTemplate', 'id', 'email_template_id');
    }
    

}
