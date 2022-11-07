<?php

namespace App\Http\Resources\CarModelAveragePrice;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CarModelAveragePriceCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new CarModelAveragePriceResource($request);
        });
    }
}
