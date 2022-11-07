<?php

namespace App\Http\Resources\Wallet;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\WalletContract;
use App\Http\Resources\Currency\CurrencyResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::USER  =>  new UserResource($this->{Contract::USER}),
            Contract::CURRENCY  =>  new CurrencyResource($this->{Contract::CURRENCY})
        ];
        foreach (WalletContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
