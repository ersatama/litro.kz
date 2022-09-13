<?php

namespace App\Http\Resources\InsuranceCompanyRequestLog;

use App\Domain\Contracts\InsuranceCompanyRequestLogContract;
use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class InsuranceCompanyRequestLogResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT},
        ];
        foreach (InsuranceCompanyRequestLogContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return $arr;
    }
}
