<?php

namespace App\Http\Resources\Message;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MessageCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new MessageResource($request);
        });
    }
}
