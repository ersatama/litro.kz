<?php

namespace App\Http\Resources\CardService;

use App\Domain\Contracts\CardServiceContract;
use App\Domain\Contracts\Contract;
use App\Http\Resources\Card\CardResource;
use App\Http\Resources\Service\ServiceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CardServiceResource extends JsonResource
{
    public function toArray($request):array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::CARD  =>  new CardResource($this->{Contract::CARD}),
            Contract::SERVICE   =>  new ServiceResource($this->{Contract::SERVICE}),
        ];
        foreach (CardServiceContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
