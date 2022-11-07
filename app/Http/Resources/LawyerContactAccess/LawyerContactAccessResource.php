<?php

namespace App\Http\Resources\LawyerContactAccess;

use App\Domain\Contracts\LawyerContactAccessContract;
use App\Domain\Contracts\Contract;
use App\Http\Resources\Lawyer\LawyerResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class LawyerContactAccessResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::LAWYER    =>  new LawyerResource($this->{Contract::LAWYER}),
            Contract::USER  =>  new UserResource($this->{Contract::USER}),
        ];
        foreach (LawyerContactAccessContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
