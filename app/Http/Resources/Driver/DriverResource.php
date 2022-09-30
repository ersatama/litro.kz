<?php

namespace App\Http\Resources\Driver;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\DriverContract;
use App\Http\Resources\OrderCard\OrderCardResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::ORDER_CARD    =>  new OrderCardResource($this->{Contract::ORDER_CARD})
        ];
        foreach (DriverContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
