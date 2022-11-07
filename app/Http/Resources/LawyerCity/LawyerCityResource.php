<?php

namespace App\Http\Resources\LawyerCity;

use App\Domain\Contracts\LawyerCityContract;
use App\Domain\Contracts\Contract;
use App\Http\Resources\City\CityResource;
use App\Http\Resources\Lawyer\LawyerResource;
use Illuminate\Http\Resources\Json\JsonResource;

class LawyerCityResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::LAWYER    =>  new LawyerResource($this->{Contract::LAWYER}),
            Contract::CITY  =>  new CityResource($this->{Contract::CITY}),
        ];
        foreach (LawyerCityContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
