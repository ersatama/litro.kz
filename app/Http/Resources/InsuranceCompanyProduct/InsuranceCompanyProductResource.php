<?php

namespace App\Http\Resources\InsuranceCompanyProduct;

use App\Domain\Contracts\InsuranceCompanyProductContract;
use App\Domain\Contracts\Contract;
use App\Http\Resources\InsuranceCategory\InsuranceCategoryResource;
use App\Http\Resources\InsuranceCompany\InsuranceCompanyResource;
use Illuminate\Http\Resources\Json\JsonResource;

class InsuranceCompanyProductResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::INSURANCE_CATEGORY    =>  new InsuranceCategoryResource($this->{Contract::INSURANCE_CATEGORY}),
            Contract::INSURANCE_COMPANY     =>  new InsuranceCompanyResource($this->{Contract::INSURANCE_COMPANY}),
        ];
        foreach (InsuranceCompanyProductContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
