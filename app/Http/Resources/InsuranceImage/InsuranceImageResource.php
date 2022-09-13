<?php

namespace App\Http\Resources\InsuranceImage;

use App\Domain\Contracts\InsuranceImageContract;
use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class InsuranceImageResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT},
        ];
        foreach (InsuranceImageContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return $arr;
    }
}
