<?php

namespace App\Http\Resources\SPartnerPoint;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\SPartnerPointContract;
use App\Http\Resources\City\CityResource;
use App\Http\Resources\Image\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SPartnerPointResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::IMAGE =>  new ImageResource($this->{Contract::IMAGE}),
            Contract::CITY  =>  new CityResource($this->{Contract::CITY})
        ];
        foreach (SPartnerPointContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
