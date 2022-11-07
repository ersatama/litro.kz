<?php

namespace App\Http\Resources\InsuranceSelectOption;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InsuranceSelectOptionCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new InsuranceSelectOptionResource($request);
        });
    }
}
