<?php

namespace App\Http\Resources\OrderCardChosenService;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderCardChosenServiceCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new OrderCardChosenServiceResource($request);
        });
    }
}
