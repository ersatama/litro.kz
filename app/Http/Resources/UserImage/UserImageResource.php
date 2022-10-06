<?php

namespace App\Http\Resources\UserImage;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\UserImageContract;
use App\Http\Resources\Image\ImageResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserImageResource extends JsonResource
{
    public function toArray($request):array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::IMAGE =>  new ImageResource($this->{Contract::IMAGE}),
        ];
        foreach (UserImageContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
