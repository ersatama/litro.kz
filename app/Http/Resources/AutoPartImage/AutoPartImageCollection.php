<?php

namespace App\Http\Resources\AutoPartImage;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AutoPartImageCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new AutoPartImageResource($request);
        });
    }
}
