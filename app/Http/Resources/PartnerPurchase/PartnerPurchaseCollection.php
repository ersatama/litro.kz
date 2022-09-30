<?php

namespace App\Http\Resources\PartnerPurchase;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PartnerPurchaseCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new PartnerPurchaseResource($request);
        });
    }
}
