<?php

namespace App\Http\Resources\City;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::TITLE =>  $this->{MainContract::TITLE},
            MainContract::TITLE_KZ  =>  $this->{MainContract::TITLE_KZ},
            MainContract::TITLE_EN  =>  $this->{MainContract::TITLE_EN},
            MainContract::REGION_ID =>  $this->{MainContract::REGION_ID},
            MainContract::IS_ACTIVE =>  $this->{MainContract::IS_ACTIVE},
            MainContract::LAT   =>  $this->{MainContract::LAT},
            MainContract::LONG  =>  $this->{MainContract::LONG},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT},
        ];
    }
}
