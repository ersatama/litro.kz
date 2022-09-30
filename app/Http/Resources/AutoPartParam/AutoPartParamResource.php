<?php

namespace App\Http\Resources\AutoPartParam;

use App\Domain\Contracts\AutoPartParamContract;
use App\Domain\Contracts\Contract;
use App\Http\Resources\AutoPartCategory\AutoPartCategoryResource;
use App\Http\Resources\AutoPartType\AutoPartTypeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AutoPartParamResource extends JsonResource
{
    public function toArray($request):array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::AUTO_PART_CATEGORY    =>  new AutoPartCategoryResource($this->{Contract::AUTO_PART_CATEGORY}),
            Contract::AUTO_PART_TYPE    =>  new AutoPartTypeResource($this->{Contract::AUTO_PART_TYPE})
        ];
        foreach (AutoPartParamContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
