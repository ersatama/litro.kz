<?php

namespace App\Http\Resources\MoneyOperation;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\MoneyOperationContract;
use App\Http\Resources\MoneyOperationType\MoneyOperationTypeResource;
use App\Http\Resources\Payment\PaymentResource;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\WalletRecord\WalletRecordResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MoneyOperationResource extends JsonResource
{
    public function toArray($request) :array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::MONEY_OPERATION_TYPE  =>  new MoneyOperationTypeResource($this->{Contract::MONEY_OPERATION_TYPE}),
            Contract::USER  =>  new UserResource($this->{Contract::USER}),
            Contract::WALLET_RECORD =>  new WalletRecordResource($this->{Contract::WALLET_RECORD}),
            Contract::PAYMENT   =>  new PaymentResource($this->{Contract::PAYMENT})
        ];
        foreach (MoneyOperationContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
