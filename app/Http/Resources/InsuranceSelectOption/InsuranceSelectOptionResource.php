<?php

namespace App\Http\Resources\InsuranceSelectOption;

use App\Domain\Contracts\InsuranceSelectOptionContract;
use App\Domain\Contracts\Contract;
use Illuminate\Http\Resources\Json\JsonResource;

class InsuranceSelectOptionResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
        ];
        foreach (InsuranceSelectOptionContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
