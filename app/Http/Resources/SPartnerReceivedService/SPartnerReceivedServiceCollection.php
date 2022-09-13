<?php

namespace App\Http\Resources\SPartnerReceivedService;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SPartnerReceivedServiceCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new SPartnerReceivedServiceResource($request);
        });
    }
}
