<?php

namespace App\Http\Resources\ServiceType;

use App\Domain\Contracts\Contract;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceTypeResource extends JsonResource
{
    public function toArray($request) :array
    {
        return [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::TITLE =>  $this->{Contract::TITLE},
            Contract::TITLE_EN  =>  $this->{Contract::TITLE_EN},
            Contract::TITLE_KZ  =>  $this->{Contract::TITLE_KZ},
            Contract::POSITION  =>  $this->{Contract::POSITION},
            Contract::CATEGORY_ID   =>  $this->{Contract::CATEGORY_ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
        ];
    }
}
