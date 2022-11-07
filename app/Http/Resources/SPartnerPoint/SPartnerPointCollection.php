<?php

namespace App\Http\Resources\SPartnerPoint;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SPartnerPointCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new SPartnerPointResource($request);
        });
    }
}
