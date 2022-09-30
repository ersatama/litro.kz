<?php

namespace App\Http\Resources\CarModel;

use App\Domain\Contracts\CarModelContract;
use App\Domain\Contracts\Contract;
use App\Http\Resources\CarBrand\CarBrandResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CarModelResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::CAR_BRAND =>  new CarBrandResource($this->{Contract::CAR_BRAND}),
        ];
        foreach (CarModelContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
