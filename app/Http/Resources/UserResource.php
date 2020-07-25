<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Constants\GenderTypes;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return [
        'id' => $this->id,
        'user_name' => $this->user_name,
        'name' => $this->name,
        'email' => $this->email,
        'image' => $this->image ?? '/images/portrait/small/avatar-s-11.jpg',
        'phone' => $this->phone,
        'home_phone' => $this->home_phone,
        'bod' => $this->bod,
        'gender' => GenderTypes::getLabel($this->gender),
        'website' => $this->website,
        'email_verified_at' => $this->email_verified_at
      ];
    }
}
