<?php

namespace App\Http\Resources\RepeatedPartnerGiftCard;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RepeatedPartnerGiftCardCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new RepeatedPartnerGiftCardResource($request);
        });
    }
}
