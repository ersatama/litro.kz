<?php

namespace App\Http\Resources\ServiceLimit;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ServiceLimitCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new ServiceLimitResource($request);
        });
    }
}
