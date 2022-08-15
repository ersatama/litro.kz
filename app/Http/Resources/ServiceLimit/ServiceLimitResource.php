<?php

namespace App\Http\Resources\ServiceLimit;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceLimitResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::SERVICE_ID    =>  $this->{MainContract::SERVICE_ID},
            MainContract::CARD_ID   =>  $this->{MainContract::CARD_ID},
            MainContract::LIMIT =>  $this->{MainContract::LIMIT},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT},
        ];
    }
}
