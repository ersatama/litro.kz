<?php

namespace App\Http\Resources\InsuranceCompanyRequestLog;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InsuranceCompanyRequestLogCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new InsuranceCompanyRequestLogResource($request);
        });
    }
}
