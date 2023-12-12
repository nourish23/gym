<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\DataMealResource;
use Carbon\Carbon;

class MealsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $time =  date('H:i:s', strtotime($this->time)) ;

        $data = [
            'id' => $this->id,
            'title' => $this->title,
            'time' => $time,
            'meal_data' => DataMealResource::collection($this->dataMeals()->where('status', '1')->get())
        ];

        return $data;
    }
}
