<?php

namespace App\Http\Resources\LawyerContactAccess;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LawyerContactAccessCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new LawyerContactAccessResource($request);
        });
    }
}
