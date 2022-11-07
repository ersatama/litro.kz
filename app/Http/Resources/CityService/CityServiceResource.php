<?php

namespace App\Http\Resources\CityService;

use App\Domain\Contracts\CityServiceContract;
use App\Domain\Contracts\Contract;
use App\Http\Resources\City\CityResource;
use App\Http\Resources\Service\ServiceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CityServiceResource extends JsonResource
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
        foreach (CityServiceContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
