<?php

namespace App\Http\Resources\ServiceLimit;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ServiceLimitContract;
use App\Http\Resources\Card\CardResource;
use App\Http\Resources\Service\ServiceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceLimitResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::SERVICE   =>  new ServiceResource($this->{Contract::SERVICE}),
            Contract::CARD  =>  new CardResource($this->{Contract::CARD})
        ];
        foreach (ServiceLimitContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
