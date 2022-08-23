<?php

namespace App\Http\Resources\Code;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class CodeResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::PHONE =>  $this->{MainContract::PHONE},
            MainContract::EMAIL =>  $this->{MainContract::EMAIL},
            MainContract::STATUS    =>  $this->{MainContract::STATUS},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT}
        ];
    }
}
