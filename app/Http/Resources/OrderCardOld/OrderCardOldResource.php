<?php

namespace App\Http\Resources\OrderCardOld;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\OrderCardOldContract;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderCardOldResource extends JsonResource
{
    public function toArray($request):array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
        ];
        foreach (OrderCardOldContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
