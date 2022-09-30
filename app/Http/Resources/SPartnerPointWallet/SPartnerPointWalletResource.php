<?php

namespace App\Http\Resources\SPartnerPointWallet;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\SPartnerPointWalletContract;
use App\Http\Resources\Currency\CurrencyResource;
use App\Http\Resources\SPartnerPoint\SPartnerPointResource;
use App\Models\SPartnerPoint;
use Illuminate\Http\Resources\Json\JsonResource;

class SPartnerPointWalletResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::S_PARTNER_POINT   =>  new SPartnerPointResource($this->{Contract::S_PARTNER_POINT}),
            Contract::CURRENCY  =>  new CurrencyResource($this->{Contract::CURRENCY})
        ];
        foreach (SPartnerPointWalletContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
