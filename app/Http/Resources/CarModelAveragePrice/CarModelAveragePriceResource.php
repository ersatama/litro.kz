<?php

namespace App\Http\Resources\CarModelAveragePrice;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class CarModelAveragePriceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::CAR_MODEL_ID  =>  $this->{MainContract::CAR_MODEL_ID},
            MainContract::YEAR  =>  $this->{MainContract::YEAR},
            MainContract::AVERAGE_PRICE =>  $this->{MainContract::AVERAGE_PRICE},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT},
        ];
    }
}
