<?php

namespace App\Http\Resources\InsuranceCompany;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InsuranceCompanyCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new InsuranceCompanyResource($request);
        });
    }
}
