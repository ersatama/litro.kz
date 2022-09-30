<?php

namespace App\Http\Resources\UserCar;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\UserCarContract;
use App\Http\Resources\CarBrand\CarBrandResource;
use App\Http\Resources\CarModel\CarModelResource;
use App\Http\Resources\User\UserResource;
use App\Models\CarBrand;
use Illuminate\Http\Resources\Json\JsonResource;

class UserCarResource extends JsonResource
{
    public function toArray($request):array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::USER  =>  new UserResource($this->{Contract::USER}),
            Contract::CAR_MODEL =>  new CarModelResource($this->{Contract::CAR_MODEL}),
            Contract::CAR_BRAND =>  new CarBrandResource($this->{Contract::CAR_BRAND})
        ];
        foreach (UserCarContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return $arr;
    }
}
