<?php

namespace App\Http\Resources\ServicePrice;

use App\Domain\Contracts\Contract;
use Illuminate\Http\Resources\Json\JsonResource;

class ServicePriceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::SERVICE_ID    =>  $this->{Contract::SERVICE_ID},
            Contract::CAR_CATEGORY_ID   =>  $this->{Contract::CAR_CATEGORY_ID},
            Contract::PRICE =>  $this->{Contract::PRICE},
            Contract::IS_FREE   =>  $this->{Contract::IS_FREE},
            Contract::IS_WITH_CHECK =>  $this->{Contract::IS_WITH_CHECK},
            Contract::IS_NEGOTIABLE_PRICE   =>  $this->{Contract::IS_NEGOTIABLE_PRICE},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
        ];
    }
}
