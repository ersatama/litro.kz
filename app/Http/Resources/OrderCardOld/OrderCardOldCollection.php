<?php

namespace App\Http\Resources\OrderCardOld;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderCardOldCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new OrderCardOldResource($request);
        });
    }
}
