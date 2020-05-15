<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoadsResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'load_name' => $this->name,
            'volume' => $this->volume,
            'photo' => $this->photo,
            'dispatch_city' => new CityResource($this->dispatchCity),
            'receiving_city' => new CityResource($this->receivingCity),
        ];
    }
}
