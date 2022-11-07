<?php

namespace App\Http\Resources\LawyerContact;

use App\Domain\Contracts\LawyerContactContract;
use App\Domain\Contracts\Contract;
use Illuminate\Http\Resources\Json\JsonResource;

class LawyerContactResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::LAWYER    =>  $this->{Contract::LAWYER}
        ];
        foreach (LawyerContactContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
