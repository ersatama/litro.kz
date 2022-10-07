<?php

namespace App\Http\Resources\UserProfile;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserProfileCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new UserProfileResource($request);
        });
    }
}
