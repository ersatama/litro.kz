<?php

namespace App\Domain\Repositories\ServiceType;

use App\Domain\Contracts\Contract;
use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\ServiceType;

class ServiceTypeRepositoryEloquent implements ServiceTypeRepositoryInterface
{
    use MainRepositoryEloquent;

    protected ServiceType $model;

    public function __construct(ServiceType $serviceType)
    {
        $this->model    =   $serviceType;
    }
}
