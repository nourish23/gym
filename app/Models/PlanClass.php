<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * Class PlanClass
 *
 * @property $id
 * @property $title
 * @property $thumbnail_url
 * @property $video_url
 * @property $description
 * @property $status
 * @property $class_type
 * @property $duration
 * @property $color
 * @property $burn_rate
 * @property $coache_id
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Coach $coach
 * @property PlansService[] $plansServices
 * @property PlanClassesEquipment[] $planClassesEquipments
 * @property ScheduledClass[] $scheduledClasses
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PlanClass extends Model
{
    use  HasTranslations;

    static $rules = [
        'title' => 'required',
        'class_type' => 'required|numeric',
        'coache_id' => 'required|numeric',
        "burn_rate" => "",
        "color" => "",
        "description" => "required",
        "thumbnail_url" => "",
        "video_url" => "",
        "link" => "",
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
        'video_url',
        'description',
        'status',
        'class_type',
        'color',
        'burn_rate',
        'coache_id'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function coach()
    {
        return $this->hasOne('App\Models\Coach', 'id', 'coache_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plansServices()
    {
        return $this->hasMany('App\Models\PlansService', 'plan_class_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function planClassesEquipments()
    {
        return $this->hasMany('App\Models\PlanClassesEquipment', 'plan_class_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scheduledClasses()
    {
        return $this->hasMany('App\Models\ScheduledClass', 'plan_class_id', 'id');
    }
}
