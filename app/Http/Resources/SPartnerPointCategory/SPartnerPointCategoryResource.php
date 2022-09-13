<?php

namespace App\Http\Resources\SPartnerPointCategory;

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\SPartnerPointCategoryContract;
use Illuminate\Http\Resources\Json\JsonResource;

class SPartnerPointCategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT},
        ];
        foreach (SPartnerPointCategoryContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return $arr;
    }
}
