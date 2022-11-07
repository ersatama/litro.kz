<?php

namespace App\Http\Resources\OrderCard;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\OrderCardContract;
use App\Http\Resources\Card\CardResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderCardResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::CARD  =>  new CardResource($this->{Contract::CARD}),
            Contract::USER  =>  new UserResource($this->{Contract::USER}),
        ];
        foreach (OrderCardContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
