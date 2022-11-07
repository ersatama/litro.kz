<?php

namespace App\Http\Resources\CarCategory;

use App\Domain\Contracts\CarCategoryContract;
use App\Domain\Contracts\Contract;
use App\Http\Resources\Image\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CarCategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::IMAGE =>  new ImageResource($this->{Contract::IMAGE})
        ];
        foreach (CarCategoryContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
