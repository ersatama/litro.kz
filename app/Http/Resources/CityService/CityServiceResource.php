<?php

namespace App\Http\Resources\CityService;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class CityServiceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::CITY_ID   =>  $this->{MainContract::CITY_ID},
            MainContract::SERVICE_ID    =>  $this->{MainContract::SERVICE_ID},
            MainContract::PRICE =>  $this->{MainContract::PRICE},
            MainContract::IS_FREE   =>  $this->{MainContract::IS_FREE},
            MainContract::IS_WITH_CHECK =>  $this->{MainContract::IS_WITH_CHECK},
            MainContract::IS_NEGOTIABLE_PRICE   =>  $this->{MainContract::IS_NEGOTIABLE_PRICE},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT}
        ];
    }
}
