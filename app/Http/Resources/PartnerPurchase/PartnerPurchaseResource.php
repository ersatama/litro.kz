<?php

namespace App\Http\Resources\PartnerPurchase;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\PartnerPurchaseContract;
use App\Http\Resources\Partner\PartnerResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PartnerPurchaseResource extends JsonResource
{
    public function toArray($request):array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::PARTNER   =>  new PartnerResource($this->{Contract::PARTNER})
        ];
        foreach (PartnerPurchaseContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
