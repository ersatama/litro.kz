<?php

namespace App\Http\Resources\ServicePrice;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ServicePriceContract;
use App\Http\Resources\CarCategory\CarCategoryResource;
use App\Http\Resources\City\CityResource;
use App\Http\Resources\Service\ServiceResource;
use App\Models\CarCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class ServicePriceResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::SERVICE   =>  new ServiceResource($this->{Contract::SERVICE}),
            Contract::CITY  =>  new CityResource($this->{Contract::CITY}),
            Contract::CAR_CATEGORY  =>  new CarCategoryResource($this->{Contract::CAR_CATEGORY})
        ];
        foreach (ServicePriceContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
