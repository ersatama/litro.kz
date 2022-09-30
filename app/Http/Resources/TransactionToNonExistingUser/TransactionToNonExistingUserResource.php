<?php

namespace App\Http\Resources\TransactionToNonExistingUser;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\TransactionToNonExistingUserContract;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionToNonExistingUserResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
        ];
        foreach (TransactionToNonExistingUserContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return $arr;
    }
}
