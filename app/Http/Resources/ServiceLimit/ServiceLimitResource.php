<?php

namespace App\Http\Resources\ServiceLimit;

use App\Domain\Contracts\Contract;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceLimitResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::SERVICE_ID    =>  $this->{Contract::SERVICE_ID},
            Contract::CARD_ID   =>  $this->{Contract::CARD_ID},
            Contract::LIMIT =>  $this->{Contract::LIMIT},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
        ];
    }
}
