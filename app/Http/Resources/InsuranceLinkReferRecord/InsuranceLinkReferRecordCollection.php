<?php

namespace App\Http\Resources\InsuranceLinkReferRecord;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InsuranceLinkReferRecordCollection extends ResourceCollection
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return $this->collection->map(function ($request) {
            return new InsuranceLinkReferRecordResource($request);
        });
    }
}
