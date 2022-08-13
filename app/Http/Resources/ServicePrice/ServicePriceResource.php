<?php

namespace App\Http\Resources\ServicePrice;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class ServicePriceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::SERVICE_ID    =>  $this->{MainContract::SERVICE_ID},
            MainContract::CAR_CATEGORY_ID   =>  $this->{MainContract::CAR_CATEGORY_ID},
            MainContract::PRICE =>  $this->{MainContract::PRICE},
            MainContract::IS_FREE   =>  $this->{MainContract::IS_FREE},
            MainContract::IS_WITH_CHECK =>  $this->{MainContract::IS_WITH_CHECK},
            MainContract::IS_NEGOTIABLE_PRICE   =>  $this->{MainContract::IS_NEGOTIABLE_PRICE},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT},
        ];
    }
}
