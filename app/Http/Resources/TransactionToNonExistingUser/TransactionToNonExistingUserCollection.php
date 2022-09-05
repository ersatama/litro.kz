<?php

namespace App\Http\Resources\TransactionToNonExistingUser;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TransactionToNonExistingUserCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new TransactionToNonExistingUserResource($request);
        });
    }
}
