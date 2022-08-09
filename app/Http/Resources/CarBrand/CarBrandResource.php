<?php

namespace App\Http\Resources\CarBrand;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class CarBrandResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::TITLE =>  $this->{MainContract::TITLE},
        ];
    }
}
