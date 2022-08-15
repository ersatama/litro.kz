<?php

namespace App\Http\Resources\CarModel;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class CarModelResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::CAR_BRAND_ID  =>  $this->{MainContract::CAR_BRAND_ID},
            MainContract::TITLE =>  $this->{MainContract::TITLE},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT},
        ];
    }
}
