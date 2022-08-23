<?php

namespace App\Http\Resources\AutoPart;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;

class AutoPartResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::IMAGE_ID  =>  $this->{MainContract::IMAGE_ID},
            MainContract::AUTO_PART_CATEGORY_ID =>  $this->{MainContract::AUTO_PART_CATEGORY_ID},
            MainContract::SUPPLIER_ID   =>  $this->{MainContract::SUPPLIER_ID},
            MainContract::PRICE =>  $this->{MainContract::PRICE},
            MainContract::UNIVERSAL =>  $this->{MainContract::UNIVERSAL},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT},
        ];
    }
}
