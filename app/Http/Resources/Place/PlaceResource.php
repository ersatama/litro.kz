<?php

namespace App\Http\Resources\Place;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\PlaceContract;
use App\Http\Resources\City\CityResource;
use App\Http\Resources\Service\ServiceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PlaceResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::CITY  =>  new CityResource($this->{Contract::CITY}),
            Contract::SERVICE   =>  new ServiceResource($this->{Contract::SERVICE}),
        ];
        foreach (PlaceContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
