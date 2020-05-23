<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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
            'names' => [
                \Str::lower($this->getTranslation('name', 'en')),
                \Str::lower($this->getTranslation('name', 'ua'))
            ],
            'slug' => $this->slug
        ];
    }
}
