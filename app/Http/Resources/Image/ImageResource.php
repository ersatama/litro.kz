<?php

namespace App\Http\Resources\Image;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
    public function toArray($request) :array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::USER_ID},
            MainContract::USER_ID   =>  $this->{MainContract::USER_ID},
            MainContract::PNG   =>  $this->{MainContract::PNG},
            MainContract::JPG   =>  $this->{MainContract::JPG},
            MainContract::WEBP  =>  $this->{MainContract::WEBP},
        ];
    }
}
