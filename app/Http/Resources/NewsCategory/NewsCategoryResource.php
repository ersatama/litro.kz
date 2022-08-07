<?php

namespace App\Http\Resources\NewsCategory;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class NewsCategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::TITLE =>  $this->{MainContract::TITLE},
            MainContract::TITLE_EN  =>  $this->{MainContract::TITLE_EN},
            MainContract::TITLE_KZ  =>  $this->{MainContract::TITLE_KZ},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT}
        ];
    }
}
