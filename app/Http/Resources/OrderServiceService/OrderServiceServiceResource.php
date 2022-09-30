<?php

namespace App\Http\Resources\OrderServiceService;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\OrderServiceServiceContract;
use App\Http\Resources\OrderService\OrderServiceResource;
use App\Http\Resources\Service\ServiceResource;
use App\Models\OrderService;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderServiceServiceResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::ORDER_SERVICE =>  new OrderServiceResource($this->{Contract::ORDER_SERVICE}),
            Contract::SERVICE   =>  new ServiceResource($this->{Contract::SERVICE})
        ];
        foreach (OrderServiceServiceContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
