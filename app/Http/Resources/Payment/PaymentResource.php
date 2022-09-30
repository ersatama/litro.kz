<?php

namespace App\Http\Resources\Payment;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\PaymentContract;
use App\Http\Resources\Currency\CurrencyResource;
use App\Http\Resources\PaymentSystem\PaymentSystemResource;
use App\Http\Resources\User\UserResource;
use App\Models\PaymentSystem;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::PAYMENT_SYSTEM    =>  new PaymentSystemResource($this->{Contract::PAYMENT_SYSTEM}),
            Contract::USER  =>  new UserResource($this->{Contract::USER}),
            Contract::CURRENCY  =>  new CurrencyResource($this->{Contract::CURRENCY}),
        ];
        foreach (PaymentContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
