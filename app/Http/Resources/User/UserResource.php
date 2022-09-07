<?php

namespace App\Http\Resources\User;

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\UserContract;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT},
        ];
        foreach (UserContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return $arr;
    }
}
