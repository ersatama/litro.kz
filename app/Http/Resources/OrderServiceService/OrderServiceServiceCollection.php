<?php

namespace App\Http\Resources\OrderServiceService;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderServiceServiceCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new OrderServiceServiceResource($request);
        });
    }
}
