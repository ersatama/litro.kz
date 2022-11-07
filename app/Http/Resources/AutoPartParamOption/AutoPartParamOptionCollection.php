<?php

namespace App\Http\Resources\AutoPartParamOption;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class AutoPartParamOptionCollection extends ResourceCollection
{
    public function toArray($request): array|Collection|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new AutoPartParamOptionResource($request);
        });
    }
}
