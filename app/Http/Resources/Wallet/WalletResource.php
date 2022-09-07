<?php

namespace App\Http\Resources\Wallet;

use App\Domain\Contracts\MainContract;
use App\Domain\Contracts\WalletContract;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT},
        ];
        foreach (WalletContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return $arr;
    }
}
