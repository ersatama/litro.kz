<?php

namespace App\Http\Resources\OrderService;

use App\Domain\Contracts\Contract;
use App\Http\Resources\CarCategory\CarCategoryResource;
use App\Http\Resources\City\CityResource;
use App\Http\Resources\OrderCard\OrderCardResource;
use App\Http\Resources\Place\PlaceResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Domain\Contracts\OrderServiceContract;

class OrderServiceResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::USER  =>  new UserResource($this->{Contract::USER}),
            Contract::ORDER_CARD    =>  new OrderCardResource($this->{Contract::ORDER_CARD}),
            Contract::CITY  =>  new CityResource($this->{Contract::CITY}),
            Contract::PLACE =>  new PlaceResource($this->{Contract::PLACE}),
            Contract::CAR_CATEGORY  =>  new CarCategoryResource($this->{Contract::CAR_CATEGORY}),
        ];
        foreach (OrderServiceContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
