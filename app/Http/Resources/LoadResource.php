<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class LoadResource extends JsonResource
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
            'name' => $this->name,
            'volume' => $this->volume,
            'photo' => Storage::url($this->photo),
            'city_from' => $this->cityFrom->name,
            'city_to' => $this->cityTo->name,
            'city_to_lat' => $this->cityTo->lat,
            'city_to_lng' => $this->cityTo->lng
        ];
    }

}
