<?php

namespace App\Http\Resources\Driver;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::FIRST_NAME    =>  $this->{MainContract::FIRST_NAME},
            MainContract::LAST_NAME =>  $this->{MainContract::LAST_NAME},
            MainContract::PATRONYMIC    =>  $this->{MainContract::PATRONYMIC},
            MainContract::REFERRAL_CODE =>  $this->{MainContract::REFERRAL_CODE},
            MainContract::ORDER_CARD_ID =>  $this->{MainContract::ORDER_CARD_ID},
            MainContract::PHONE =>  $this->{MainContract::PHONE}
        ];
    }
}
