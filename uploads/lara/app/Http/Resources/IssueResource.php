<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IssueResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'from' => $this->from,
            'to' => $this->to,
            'type' => $this->type,
            'area' => new AreaResource($this->area),
            'category' => new AreaResource($this->category),
            'images' => IssueImagesResource::collection($this->images)
        ];
    }
}
