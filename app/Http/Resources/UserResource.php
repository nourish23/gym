<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $cat = Category::findOrFail($this->plan->category_id);
        $data = [
            "id" => $this->id,
            "email" => $this->email,
            "name" => $this->first_name . " " . $this->last_name,
            "phone" => $this->phone_number,
            "birthday" => $this->birthday,
            "diseases_symptoms" => $this->diseases_symptoms,
            "image_url" => $this->image_url ? $this->image_url : "",
            "health_problems" => $this->health_problems,
            "food_disliked" => $this->food_disliked,
            "supplements_taken" => $this->supplements_taken,
            "do_you_have_anything_else_to_tell_us_about" => $this->do_you_have_anything_else_to_tell_us_about,
            "fcm_token" => $this->fcm_token ? $this->fcm_token : "",
            "subscription_type" => $cat->title ? $cat->title : "",
            "subscription_duration" => $this->plan ? $this->plan->title : "",
            "subscription_start_date" => Carbon::parse($this->subscription_start_date)->format('Y-m-d\TH:i:s.u\Z'),
            "subscription_end_date" =>Carbon::parse($this->subscription_end_date)->format('Y-m-d\TH:i:s.u\Z'),
            "is_active" => $this->is_active,
            "is_paid" => $this->is_paid,
            "total_class" => $this->total_class
        ];
        return $data; // parent::toArray($request);
    }
}
