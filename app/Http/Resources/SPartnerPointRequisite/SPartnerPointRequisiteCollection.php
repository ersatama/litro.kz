<?php

namespace App\Http\Resources\SPartnerPointRequisite;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SPartnerPointRequisiteCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new SPartnerPointRequisiteResource($request);
        });
    }
}
