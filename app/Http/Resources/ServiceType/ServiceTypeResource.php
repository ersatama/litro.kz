<?php

namespace App\Http\Resources\ServiceType;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ServiceTypeContract;
use App\Http\Resources\CardCategory\CardCategoryResource;
use App\Http\Resources\Image\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceTypeResource extends JsonResource
{
    public function toArray($request) :array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::CARD_CATEGORY =>  new CardCategoryResource($this->{Contract::CARD_CATEGORY}),
            Contract::IMAGE =>  new ImageResource($this->{Contract::IMAGE})
        ];
        foreach (ServiceTypeContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
