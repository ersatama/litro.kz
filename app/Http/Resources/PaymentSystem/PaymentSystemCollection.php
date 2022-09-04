<?php

namespace App\Http\Resources\PaymentSystem;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PaymentSystemCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new PaymentSystemResource($request);
        });
    }
}
