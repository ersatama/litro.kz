<?php

namespace App\Http\Resources\CarCategory;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class CarCategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::IMAGE_ID  =>  $this->{MainContract::IMAGE_ID},
            MainContract::TITLE =>  $this->{MainContract::TITLE},
            MainContract::TITLE_KZ  =>  $this->{MainContract::TITLE_KZ},
            MainContract::TITLE_EN  =>  $this->{MainContract::TITLE_EN}
        ];
    }
}
