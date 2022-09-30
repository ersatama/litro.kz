<?php

namespace App\Http\Resources\CarBrand;

use App\Domain\Contracts\CarBrandContract;
use App\Domain\Contracts\Contract;
use App\Http\Resources\CarModel\CarModelCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CarBrandResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
        ];
        foreach (CarBrandContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
