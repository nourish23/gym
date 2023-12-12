<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class PageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $locale = App::getLocale();
        $data = [
            'id' => $this->id,    
            'title' => $this->getTranslation('title', $locale,true),
            'description' => $this->getTranslation('description', $locale,true),
               
        ];
        return $data; //parent::toArray($request);
    }
}
