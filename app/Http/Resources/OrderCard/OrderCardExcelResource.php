<?php

namespace App\Http\Resources\OrderCard;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\OrderCardContract;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderCardExcelResource extends JsonResource
{
    public function toArray($request):array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
        ];
        foreach (OrderCardContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        $arr[Contract::CARD_ID] =   $this->{Contract::CARD}->{Contract::TITLE};
        $arr[Contract::CREATED_AT]  =   $this->{Contract::CREATED_AT};
        $arr[Contract::UPDATED_AT]  =   $this->{Contract::UPDATED_AT};
        $arr[Contract::DELETED_AT]  =   $this->{Contract::DELETED_AT};
        return $arr;
    }
}
