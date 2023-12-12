<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ScheduledClass
 *
 * @property $id
 * @property $plan_class_id
 * @property $day_id
 * @property $start_time
 * @property $end_time
 * @property $status
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Day $day
 * @property PlanClass $planClass
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ScheduledClass extends Model
{

    static $rules = [
        'plan_class_id' => 'required',
        'day_id' => 'required',
        'status' => 'required',
        'url' => 'string',
    ];

    protected $perPage = 12;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['plan_class_id', 'day_id', 'start_time', 'end_time', 'status', 'url'];


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
    public function planClass()
    {
        return $this->hasOne('App\Models\PlanClass', 'id', 'plan_class_id');
    }

}
