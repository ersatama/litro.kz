<?php

namespace App\Http\Resources\InsuranceCategory;

use App\Domain\Contracts\InsuranceCategoryContract;
use App\Domain\Contracts\Contract;
use Illuminate\Http\Resources\Json\JsonResource;

class InsuranceCategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
        ];
        foreach (InsuranceCategoryContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
