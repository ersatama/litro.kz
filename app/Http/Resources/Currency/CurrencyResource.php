<?php

namespace App\Http\Resources\Currency;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyResource extends JsonResource
{
    public function toArray($request):array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::ISO_TITLE =>  $this->{MainContract::ISO_TITLE}
        ];
    }
}
