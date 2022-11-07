<?php

namespace App\Http\Resources\SPartnerPointCategory;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\SPartnerPointCategoryContract;
use App\Http\Resources\SPartnerPoint\SPartnerPointResource;
use App\Http\Resources\SPartnerServiceCategory\SPartnerServiceCategoryResource;
use App\Models\SPartnerPoint;
use Illuminate\Http\Resources\Json\JsonResource;

class SPartnerPointCategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::S_PARTNER_POINT   =>  new SPartnerPointResource($this->{Contract::S_PARTNER_POINT}),
            Contract::S_PARTNER_SERVICE_CATEGORY    =>  new SPartnerServiceCategoryResource($this->{Contract::S_PARTNER_SERVICE_CATEGORY})
        ];
        foreach (SPartnerPointCategoryContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
