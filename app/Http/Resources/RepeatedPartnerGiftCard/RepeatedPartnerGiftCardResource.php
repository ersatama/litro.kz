<?php

namespace App\Http\Resources\RepeatedPartnerGiftCard;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\RepeatedPartnerGiftCardContract;
use App\Http\Resources\Card\CardResource;
use App\Http\Resources\Partner\PartnerResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RepeatedPartnerGiftCardResource extends JsonResource
{
    public function toArray($request):array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::CARD  =>  new CardResource($this->{Contract::CARD}),
            Contract::PARTNER   =>  new PartnerResource($this->{Contract::PARTNER})
        ];
        foreach (RepeatedPartnerGiftCardContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
