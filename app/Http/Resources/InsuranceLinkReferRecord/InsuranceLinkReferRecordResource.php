<?php

namespace App\Http\Resources\InsuranceLinkReferRecord;

use App\Domain\Contracts\InsuranceLinkReferRecordContract;
use App\Domain\Contracts\Contract;
use App\Http\Resources\InsuranceCompany\InsuranceCompanyResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class InsuranceLinkReferRecordResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::INSURANCE_COMPANY =>  new InsuranceCompanyResource($this->{Contract::INSURANCE_COMPANY}),
            Contract::USER  =>  new UserResource($this->{Contract::USER})
        ];
        foreach (InsuranceLinkReferRecordContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
