<?php

namespace App\Http\Resources\Region;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class RegionCollection extends ResourceCollection
{
    public function toArray($request): array|Collection|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new RegionResource($request);
        });
    }
}
