<?php

namespace App\Http\Resources\NotificationType;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NotificationTypeCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new NotificationTypeResource($request);
        });
    }
}
