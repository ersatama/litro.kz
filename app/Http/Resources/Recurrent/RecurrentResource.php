<?php

namespace App\Http\Resources\Recurrent;

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\RecurrentContract;
use Illuminate\Http\Resources\Json\JsonResource;

class RecurrentResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT},
        ];
        foreach (RecurrentContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return $arr;
    }
}
