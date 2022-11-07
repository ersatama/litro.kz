<?php

namespace App\Http\Resources\AutoPart;

use App\Domain\Contracts\AutoPartContract;
use App\Domain\Contracts\Contract;
use App\Http\Resources\AutoPartCategory\AutoPartCategoryResource;
use App\Http\Resources\Image\ImageResource;
use App\Models\AutoPartCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class AutoPartResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::IMAGE =>  new ImageResource($this->{Contract::IMAGE}),
            Contract::AUTO_PART_CATEGORY    =>  new AutoPartCategoryResource($this->{Contract::AUTO_PART_CATEGORY})
        ];
        foreach (AutoPartContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
