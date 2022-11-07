<?php

namespace App\Http\Resources\LawyerServicePivot;

use App\Domain\Contracts\LawyerServicePivotContract;
use App\Domain\Contracts\Contract;
use App\Http\Resources\Lawyer\LawyerResource;
use App\Http\Resources\LawyerService\LawyerServiceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class LawyerServicePivotResource extends JsonResource
{
    public function toArray($request): array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::LAWYER    =>  new LawyerResource($this->{Contract::LAWYER}),
            Contract::LAWYER_SERVICE    =>  new LawyerServiceResource($this->{Contract::LAWYER_SERVICE})
        ];
        foreach (LawyerServicePivotContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
