<?php

namespace App\Http\Resources\InsuranceCompanyRequestLog;

use App\Domain\Contracts\InsuranceCompanyRequestLogContract;
use App\Domain\Contracts\Contract;
use App\Http\Resources\InsuranceCompany\InsuranceCompanyResource;
use Illuminate\Http\Resources\Json\JsonResource;

class InsuranceCompanyRequestLogResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::INSURANCE_COMPANY     =>  new InsuranceCompanyResource($this->{Contract::INSURANCE_COMPANY}),
        ];
        foreach (InsuranceCompanyRequestLogContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
