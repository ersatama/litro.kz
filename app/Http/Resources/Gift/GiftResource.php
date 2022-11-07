<?php

namespace App\Http\Resources\Gift;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\GiftContract;
use App\Http\Resources\Card\CardResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class GiftResource extends JsonResource
{
    public function toArray($request):array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::USER  =>  new UserResource($this->{Contract::USER}),
            Contract::CARD  =>  new CardResource($this->{Contract::CARD})
        ];
        foreach (GiftContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
