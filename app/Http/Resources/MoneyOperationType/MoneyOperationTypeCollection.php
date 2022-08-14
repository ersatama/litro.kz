<?php

namespace App\Http\Resources\MoneyOperationType;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class MoneyOperationTypeCollection extends ResourceCollection
{
    public function toArray($request): array|Collection|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new MoneyOperationTypeResource($request);
        });
    }
}
