<?php

namespace App\Http\Resources\SPartnerPointWallet;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SPartnerPointWalletCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new SPartnerPointWalletResource($request);
        });
    }
}
