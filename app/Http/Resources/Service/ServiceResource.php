<?php

namespace App\Http\Resources\Service;

use App\Domain\Contracts\Contract;
use App\Domain\Contracts\ServiceContract;
use App\Http\Resources\Image\ImageResource;
use App\Http\Resources\ServiceType\ServiceTypeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    public function toArray($request):array
    {
        $arr    =   [
            Contract::ID    =>  $this->{Contract::ID},
            Contract::CREATED_AT    =>  $this->{Contract::CREATED_AT},
            Contract::UPDATED_AT    =>  $this->{Contract::UPDATED_AT},
            Contract::SERVICE_TYPE  =>  new ServiceTypeResource($this->{Contract::SERVICE_TYPE}),
            Contract::IMAGE =>  new ImageResource($this->{Contract::IMAGE}),
            Contract::BROWSER_IMAGE =>  new ImageResource($this->{Contract::BROWSER_IMAGE}),
            Contract::ADDITIONAL_IMAGE  =>  new ImageResource($this->{Contract::ADDITIONAL_IMAGE})
        ];
        foreach (ServiceContract::FILLABLE as &$value) {
            $arr[$value]    =   $this->{$value};
        }
        return Contract::CLEAR($arr);
    }
}
