<?php

namespace App\Http\Resources\InsuranceSelect;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InsuranceSelectCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new InsuranceSelectResource($request);
        });
    }
}
