<?php

namespace App\Http\Resources\ThirdPartyApp;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ThirdPartyAppCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new ThirdPartyAppResource($request);
        });
    }
}
