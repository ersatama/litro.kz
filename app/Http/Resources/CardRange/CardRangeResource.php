<?php

namespace App\Http\Resources\CardRange;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class CardRangeResource extends JsonResource
{
    public function toArray($request):array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::CITY_ID   =>  $this->{MainContract::CITY_ID},
            MainContract::CARD_ID   =>  $this->{MainContract::CARD_ID},
            MainContract::CURRENT_SYNCED    =>  $this->{MainContract::CURRENT_SYNCED},
            MainContract::LEGAL_PERSON  =>  $this->{MainContract::LEGAL_PERSON},
            MainContract::C_FROM    =>  $this->{MainContract::C_FROM},
            MainContract::C_TO  =>  $this->{MainContract::C_TO},
            MainContract::STATUS    =>  $this->{MainContract::STATUS},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT}
        ];
    }
}
