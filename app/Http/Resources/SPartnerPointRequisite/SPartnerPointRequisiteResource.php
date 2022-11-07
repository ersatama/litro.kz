<?php

namespace App\Http\Resources\SPartnerPointRequisite;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\SPartnerPointRequisiteContract;
use App\Http\Resources\SPartnerPoint\SPartnerPointResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SPartnerPointRequisiteResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::S_PARTNER_POINT   =>  new SPartnerPointResource($this->{Contract::S_PARTNER_POINT}),
        ];
        foreach (SPartnerPointRequisiteContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
