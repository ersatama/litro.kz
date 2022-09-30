<?php

namespace App\Http\Resources\City;

use App\Domain\Contracts\CityContract;
use App\Domain\Contracts\Contract;
use App\Http\Resources\Region\RegionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::REGION    =>  new RegionResource($this->{Contract::REGION}),
        ];
        foreach (CityContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
