<?php

namespace App\Http\Resources\Car;

use App\Domain\Contracts\CarContract;
use App\Domain\Contracts\Contract;
use App\Http\Resources\CarModel\CarModelResource;
use App\Http\Resources\OrderCard\OrderCardResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    public function toArray($request):array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::CAR_MODEL =>  new CarModelResource($this->{Contract::CAR_MODEL}),
            Contract::ORDER_CARD    =>  new OrderCardResource($this->{Contract::ORDER_CARD})
        ];
        foreach (CarContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
