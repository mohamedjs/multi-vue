<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
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
            "user_id" => $this->user_id,
            "user_name" => $this->user->first_name . " " . $this->user->last_name,
            "image" => $this->image,
            "message" => $this->message,
            "type" => $this->type
        ];
    }
}
