<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Constants\GenderTypes;
use App\Constants\UserTypes;
use App\Constants\ActiveStatus;

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
        'user_name' => $this->user_name ?? 'example:mideo',
        'name' => $this->name ?? 'example:mohamed',
        'email' => $this->email,
        'image' => $this->image ? url($this->image) : '/images/portrait/small/avatar-s-11.jpg',
        'phone' => $this->phone ?? '(02)--- -- --',
        'home_phone' => $this->home_phone?? 'exmple:cairot',
        'bod' => $this->bod ? date('d-m-Y', strtotime($this->bod)) : date('d-m-Y'),
        'gender' => GenderTypes::getLabel($this->gender),
        'website' => $this->website ?? 'example.com',
        'email_verified_at' => $this->email_verified_at,
        'user_type' => UserTypes::getLabel($this->user_type),
        'status' => ActiveStatus::getLabel($this->status)
      ];
    }
}
