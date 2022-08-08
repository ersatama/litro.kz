<?php

namespace App\Http\Resources\AutoPartParamOption;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class AutoPartParamOptionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::AUTO_PART_PARAM_ID    =>  $this->{MainContract::AUTO_PART_PARAM_ID},
            MainContract::AUTO_PART_TYPE_ID =>  $this->{MainContract::AUTO_PART_TYPE_ID},
            MainContract::FILTER    =>  $this->{MainContract::FILTER},
            MainContract::TITLE =>  $this->{MainContract::TITLE},
            MainContract::TITLE_KZ  =>  $this->{MainContract::TITLE_KZ},
            MainContract::TITLE_EN  =>  $this->{MainContract::TITLE_EN}
        ];
    }
}
