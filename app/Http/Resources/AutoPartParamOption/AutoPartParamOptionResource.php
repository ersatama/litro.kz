<?php

namespace App\Http\Resources\AutoPartParamOption;

use App\Domain\Contracts\AutoPartParamOptionContract;
use App\Domain\Contracts\Contract;
use App\Http\Resources\AutoPartParam\AutoPartParamResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AutoPartParamOptionResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::AUTO_PART_PARAM_ID    =>  new AutoPartParamResource($this->{Contract::AUTO_PART_PARAM_ID}),
        ];
        foreach (AutoPartParamOptionContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
