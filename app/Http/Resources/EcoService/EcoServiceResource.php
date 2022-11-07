<?php

namespace App\Http\Resources\EcoService;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\EcoServiceContract;
use App\Models\EcoService;
use Illuminate\Http\Resources\Json\JsonResource;

class EcoServiceResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
        ];
        foreach (EcoServiceContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
