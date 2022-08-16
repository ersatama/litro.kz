<?php

namespace App\Http\Resources\AutoPart;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AutoPartCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new AutoPartResource($request);
        });
    }
}
