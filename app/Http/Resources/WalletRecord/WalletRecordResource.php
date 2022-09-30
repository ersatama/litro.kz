<?php

namespace App\Http\Resources\WalletRecord;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\WalletRecordContract;
use App\Http\Resources\Currency\CurrencyResource;
use App\Http\Resources\Payment\PaymentResource;
use App\Http\Resources\Wallet\WalletResource;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletRecordResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::PAYMENT   =>  new PaymentResource($this->{Contract::PAYMENT}),
            Contract::WALLET    =>  new WalletResource($this->{Contract::WALLET}),
            Contract::CURRENCY  =>  new CurrencyResource($this->{Contract::CURRENCY})
        ];
        foreach (WalletRecordContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
