<?php

namespace App\Http\Resources\EcoService;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class EcoServiceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::POSITION  =>  $this->{MainContract::POSITION},
            MainContract::STATUS    =>  $this->{MainContract::STATUS},
            MainContract::TYPE  =>  $this->{MainContract::TYPE},
            MainContract::TITLE =>  $this->{MainContract::TITLE},
            MainContract::TITLE_KZ  =>  $this->{MainContract::TITLE_KZ},
            MainContract::TITLE_EN  =>  $this->{MainContract::TITLE_EN},
            MainContract::DESCRIPTION   =>  $this->{MainContract::DESCRIPTION},
            MainContract::DESCRIPTION_KZ    =>  $this->{MainContract::DESCRIPTION_KZ},
            MainContract::DESCRIPTION_EN    =>  $this->{MainContract::DESCRIPTION_EN},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT},
        ];
    }
}
