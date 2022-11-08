<?php

namespace App\Http\Resources\EcoServiceImage;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class EcoServiceImageCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new EcoServiceImageResource($request);
        });
    }
}
