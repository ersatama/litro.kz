<?php

namespace App\Http\Resources\Card;

use App\Domain\Contracts\CardContract;
use App\Domain\Contracts\Contract;
use App\Http\Resources\CardCategory\CardCategoryResource;
use App\Http\Resources\Image\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
{
    public function toArray($request) :array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::IMAGE =>  new ImageResource($this->{Contract::IMAGE}),
            Contract::_IMG =>  new ImageResource($this->{Contract::_IMG}),
            Contract::_ICON =>  new ImageResource($this->{Contract::_ICON}),
            Contract::_ICON_SELECTED    =>  new ImageResource($this->{Contract::_ICON_SELECTED}),
            Contract::CARD_CATEGORY =>  new CardCategoryResource($this->{Contract::CARD_CATEGORY})
        ];
        foreach (CardContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
