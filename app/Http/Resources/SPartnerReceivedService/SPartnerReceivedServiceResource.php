<?php

namespace App\Http\Resources\SPartnerReceivedService;

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\SPartnerReceivedServiceContract;
use Illuminate\Http\Resources\Json\JsonResource;

class SPartnerReceivedServiceResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT},
        ];
        foreach (SPartnerReceivedServiceContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return $arr;
    }
}
