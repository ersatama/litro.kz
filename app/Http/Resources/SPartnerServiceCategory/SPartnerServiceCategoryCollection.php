<?php

namespace App\Http\Resources\SPartnerServiceCategory;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SPartnerServiceCategoryCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new SPartnerServiceCategoryResource($request);
        });
    }
}
