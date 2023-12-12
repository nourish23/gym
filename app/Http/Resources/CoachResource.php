<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CoachResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $locale = \App::getLocale();
        $data = [
            'id' => $this->id,
            'name' => $this->getTranslation('name', $locale,true),
            'brief' => $this->getTranslation('brief', $locale,true),
            'description' => $this->getTranslation('description', $locale,true),
            'image_url' => $this->image_url
        ];
        return $data; //parent::toArray($request);
    }
}
