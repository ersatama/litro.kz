<?php

namespace App\Http\Resources\Region;

use App\Domain\Contracts\Contract;
use Illuminate\Http\Resources\Json\JsonResource;

class RegionResource extends JsonResource
{
    public function toArray($request):array
    {
        return [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::TITLE =>  $this->{Contract::TITLE},
            Contract::TITLE_KZ  =>  $this->{Contract::TITLE_KZ},
            Contract::TITLE_EN  =>  $this->{Contract::TITLE_EN},
            Contract::COUNTRY_ID    =>  $this->{Contract::COUNTRY_ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
        ];
    }
}
