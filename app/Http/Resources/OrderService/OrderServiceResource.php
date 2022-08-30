<?php

namespace App\Http\Resources\OrderService;

use App\Domain\Contracts\MainContract;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Domain\Contracts\OrderServiceContract;

class OrderServiceResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            MainContract::ID    =>  $this->{MainContract::ID},
            MainContract::CREATED_AT    =>  $this->{MainContract::CREATED_AT},
            MainContract::UPDATED_AT    =>  $this->{MainContract::UPDATED_AT},
        ];
        foreach (OrderServiceContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return $arr;
    }
}
