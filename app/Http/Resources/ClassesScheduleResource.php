<?php

namespace App\Http\Resources;

use App\Models\Equipment;
use App\Models\PlanClassesEquipment;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class ClassesScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {
        $equipmentIds = PlanClassesEquipment::where('plan_class_id', $this->planClass->id)
            ->distinct()
            ->pluck('equipment_id');

        $equi = [];

        foreach ($equipmentIds as $equipmentId) {
            $equipment = Equipment::find($equipmentId);

            if ($equipment) {
                $equi[] = [
                    'equipment_id' => $equipment->id,
                    'name' => $equipment->name,
                    'status' => $equipment->status,
                    'deleted_at' => $equipment->deleted_at,
                    'created_at' => $equipment->created_at,
                    'updated_at' => $equipment->updated_at,
                ];
            }
        }

        // The rest of your code remains the same...
        $locale = App::getLocale();

        $data = [
            'id' => $this->id,
            'day' => $this->day->day,
            'url' => $this->url,
            'start_time' => Carbon::createFromFormat('Y-m-d H:i:s', $this->start_time)->format('H:i:s'),
            'end_time' => Carbon::createFromFormat('Y-m-d H:i:s', $this->end_time)->format('H:i:s'),
            'class_details' => [
                'color' => $this->planClass ? $this->planClass->color : "",
                'title' => $this->planClass ? $this->planClass->getTranslation('title', $locale, true) : "",
                'description' => $this->planClass ? $this->planClass->getTranslation('description', $locale, true) : "",
                'thumbnail_url' => $this->planClass ? $this->planClass->thumbnail_url : "",
                'burn_rate' => $this->planClass ? $this->planClass->burn_rate : "",
                'equipment_needed' => $equi,
            ],
            'coach' => $this->planClass ? CoachResource::make($this->planClass->coach) : "",
        ];

        return $data;
    }
}
