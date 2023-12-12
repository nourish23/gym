<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PlanClassesEquipment
 *
 * @property $id
 * @property $equipment_id
 * @property $plan_class_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Equipment $equipment
 * @property PlanClass $planClass
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PlanClassesEquipment extends Model
{
    
    static $rules = [
		'equipment_id' => 'required',
		'plan_class_id' => 'required',
    ];

    protected $perPage = 12;
    protected $table = "plan_classes_equipments";
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['equipment_id','plan_class_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipment()
    {
        return $this->hasOne('App\Models\Equipment', 'id', 'equipment_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function planClass()
    {
        return $this->hasOne('App\Models\PlanClass', 'id', 'plan_class_id');
    }
    

}
