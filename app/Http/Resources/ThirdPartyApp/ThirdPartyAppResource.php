<?php

namespace App\Http\Resources\ThirdPartyApp;

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\ThirdPartyAppContract;
use Illuminate\Http\Resources\Json\JsonResource;

class ThirdPartyAppResource extends JsonResource
{
    public function toArray($request):array
    {
        $arr    =   [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT},
        ];
        foreach (ThirdPartyAppContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return $arr;
    }
}
