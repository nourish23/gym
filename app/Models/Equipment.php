<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Equipment
 *
 * @property $id
 * @property $name
 * @property $additional_info
 * @property $status
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property PlanClassesEquipment[] $planClassesEquipments
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Equipment extends Model
{

    static $rules = [
		'name' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 12;
    protected $table = 'equipments';
    public $hidden = ['created_at' , 'updated_at'];
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','additional_info','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function planClassesEquipments()
    {
        return $this->hasMany('App\Models\PlanClassesEquipment', 'equipment_id', 'id');
    }
    

}
