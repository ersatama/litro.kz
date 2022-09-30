<?php

namespace App\Http\Resources\PaymentSystem;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\PaymentSystemContract;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentSystemResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
        ];
        foreach (PaymentSystemContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
