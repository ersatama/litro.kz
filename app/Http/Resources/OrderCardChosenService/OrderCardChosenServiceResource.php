<?php

namespace App\Http\Resources\OrderCardChosenService;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\OrderCardChosenServiceContract;
use App\Http\Resources\OrderCard\OrderCardResource;
use App\Http\Resources\Service\ServiceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderCardChosenServiceResource extends JsonResource
{
    public function toArray($request):array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::ORDER_CARD    =>  new OrderCardResource($this->{Contract::ORDER_CARD}),
            Contract::SERVICE   =>  new ServiceResource($this->{Contract::SERVICE}),
        ];
        foreach (OrderCardChosenServiceContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
