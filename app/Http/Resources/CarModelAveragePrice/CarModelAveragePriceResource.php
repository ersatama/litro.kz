<?php

namespace App\Http\Resources\CarModelAveragePrice;

use App\Domain\Contracts\CarModelAveragePriceContract;
use App\Domain\Contracts\Contract;
use App\Http\Resources\CarModel\CarModelResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CarModelAveragePriceResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::CAR_MODEL =>  new CarModelResource($this->{Contract::CAR_MODEL}),
        ];
        foreach (CarModelAveragePriceContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
