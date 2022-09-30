<?php

namespace App\Http\Resources\SPartnerPointWalletRecord;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\SPartnerPointWalletRecordContract;
use App\Http\Resources\SPartnerPointWallet\SPartnerPointWalletResource;
use App\Http\Resources\SPartnerReceivedService\SPartnerReceivedServiceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SPartnerPointWalletRecordResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::S_PARTNER_POINT_WALLET    =>  new SPartnerPointWalletResource($this->{Contract::S_PARTNER_POINT_WALLET}),
            Contract::S_PARTNER_RECEIVED_SERVICE  =>  new SPartnerReceivedServiceResource($this->{Contract::S_PARTNER_RECEIVED_SERVICE})
        ];
        foreach (SPartnerPointWalletRecordContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
