<?php

namespace App\Http\Resources\PartnerCard;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\PartnerCardContract;
use App\Http\Resources\Card\CardResource;
use App\Http\Resources\Partner\PartnerResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PartnerCardResource extends JsonResource
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
        foreach (PartnerCardContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
