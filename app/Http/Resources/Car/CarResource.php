<?php

namespace App\Http\Resources\Car;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    public function toArray($request):array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::CAR_MODEL_ID  =>  $this->{MainContract::CAR_MODEL_ID},
            MainContract::YEAR  =>  $this->{MainContract::YEAR},
            MainContract::CAR_NUMBER    =>  $this->{MainContract::CAR_NUMBER},
            MainContract::ORDER_CARD_ID =>  $this->{MainContract::ORDER_CARD_ID},
            MainContract::VIN   =>  $this->{MainContract::VIN},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT},
        ];
    }
}
