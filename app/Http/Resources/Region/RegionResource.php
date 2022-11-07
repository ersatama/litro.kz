<?php

namespace App\Http\Resources\Region;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\RegionContract;
use App\Http\Resources\Country\CountryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RegionResource extends JsonResource
{
    public function toArray($request):array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::COUNTRY   =>  new CountryResource($this->{Contract::COUNTRY})
        ];
        foreach (RegionContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
