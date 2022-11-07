<?php

namespace App\Http\Resources\LawyerServicePivot;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LawyerServicePivotCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new LawyerServicePivotResource($request);
        });
    }
}
