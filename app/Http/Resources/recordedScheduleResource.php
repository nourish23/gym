<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CoachResource;
use App\Models\Equipment;
use App\Models\PlanClassesEquipment;
use Illuminate\Support\Facades\App;

class recordedScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $equipmentIds = PlanClassesEquipment::where('plan_class_id', $this->id)
            ->distinct()
            ->pluck('equipment_id'); // Get distinct equipment_ids

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

        $locale = App::getLocale();
        $data = [
            'id' => $this->id,
            'date' => $this->created_at,
            'duration' => $this->duration,
            'video_url' => $this->video_url,

            'class_details' => [
                'title' => $this->getTranslation('title', $locale, true),
                'description' => $this->getTranslation('description', $locale, true),
                'thumbnail_url' => $this->thumbnail_url,
                'burn_rate' => $this->burn_rate,
                'equipment_needed' => $equi,
            ],
            'coach' => CoachResource::make($this->coach),
        ];

        return $data;
    }
}
