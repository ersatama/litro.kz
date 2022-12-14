<?php

namespace App\Http\Resources\User;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\UserContract;
use App\Http\Resources\City\CityResource;
use App\Http\Resources\Role\RoleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::FULL  =>  $this->{Contract::ID} . ' - ' . $this->{Contract::FIRST_NAME} . ' ' . $this->{Contract::LAST_NAME},
            Contract::CITY  =>  new CityResource($this->{Contract::CITY}),
            Contract::ROLE  =>  new RoleResource($this->{Contract::ROLE})
        ];
        foreach (UserContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
