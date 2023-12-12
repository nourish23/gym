<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class CountryResource extends JsonResource
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
            'name' => $this->getTranslation('name', $locale,true),
            'code' => $this->code,
            'flag_url' => $this->flag_url,
            'phone_code' => $this->phone_code
        ];
        return $data; //parent::toArray($request);
    }
}
