<?php

namespace App\Http\Resources\SPartnerReceivedService;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\SPartnerReceivedServiceContract;
use App\Http\Resources\Currency\CurrencyResource;
use App\Http\Resources\SPartnerPoint\SPartnerPointResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SPartnerReceivedServiceResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::USER  =>  new UserResource($this->{Contract::USER}),
            Contract::CURRENCY  =>  new CurrencyResource($this->{Contract::CURRENCY}),
            Contract::S_PARTNER_POINT   =>  new SPartnerPointResource($this->{Contract::S_PARTNER_POINT}),
        ];
        foreach (SPartnerReceivedServiceContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
