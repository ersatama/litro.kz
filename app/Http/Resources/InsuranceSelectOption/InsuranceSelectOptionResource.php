<?php

namespace App\Http\Resources\InsuranceSelectOption;

use App\Domain\Contracts\InsuranceSelectOptionContract;
use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class InsuranceSelectOptionResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT},
        ];
        foreach (InsuranceSelectOptionContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return $arr;
    }
}
