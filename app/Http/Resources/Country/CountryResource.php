<?php

namespace App\Http\Resources\Country;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    public function toArray($request):array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::TITLE =>  $this->{MainContract::TITLE},
            MainContract::TITLE_KZ  =>  $this->{MainContract::TITLE_KZ},
            MainContract::TITLE_EN  =>  $this->{MainContract::TITLE_EN},
        ];
    }
}
