<?php

namespace App\Http\Resources\CardRange;

use App\Domain\Contracts\CardRangeContract;
use App\Domain\Contracts\Contract;
use App\Http\Resources\Card\CardResource;
use App\Http\Resources\City\CityResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CardRangeResource extends JsonResource
{
    public function toArray($request):array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::CITY  =>  new CityResource($this->{Contract::CITY}),
            Contract::CARD  =>  new CardResource($this->{Contract::CARD})
        ];
        foreach (CardRangeContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
