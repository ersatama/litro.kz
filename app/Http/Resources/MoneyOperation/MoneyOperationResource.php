<?php

namespace App\Http\Resources\MoneyOperation;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class MoneyOperationResource extends JsonResource
{
    public function toArray($request) :array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::MONEY_OPERATION_TYPE_ID   =>  $this->{MainContract::MONEY_OPERATION_TYPE_ID},
            MainContract::USER_ID   =>  $this->{MainContract::USER_ID},
            MainContract::WALLET_RECORD_ID  =>  $this->{MainContract::WALLET_RECORD_ID},
            MainContract::PAYMENT_ID    =>  $this->{MainContract::PAYMENT_ID},
            MainContract::STATUS    =>  $this->{MainContract::STATUS},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT},
        ];
    }
}
