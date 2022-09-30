<?php

namespace App\Http\Resources\MoneyOperationType;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\MoneyOperationTypeContract;
use Illuminate\Http\Resources\Json\JsonResource;

class MoneyOperationTypeResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
        ];
        foreach (MoneyOperationTypeContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
