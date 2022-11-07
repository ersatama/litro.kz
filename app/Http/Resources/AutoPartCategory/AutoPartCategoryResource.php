<?php

namespace App\Http\Resources\AutoPartCategory;

use App\Domain\Contracts\AutoPartCategoryContract;
use App\Domain\Contracts\Contract;
use Illuminate\Http\Resources\Json\JsonResource;

class AutoPartCategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::AUTO_PART_CATEGORY    =>  new AutoPartCategoryResource($this->{Contract::AUTO_PART_CATEGORY})
        ];
        foreach (AutoPartCategoryContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
