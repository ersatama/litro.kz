<?php

namespace App\Http\Resources\InsuranceKaskoPolicy;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InsuranceKaskoPolicyCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new InsuranceKaskoPolicyResource($request);
        });
    }
}
