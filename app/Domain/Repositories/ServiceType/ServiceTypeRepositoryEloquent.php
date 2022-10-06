<?php

namespace App\Domain\Repositories\ServiceType;

use App\Domain\Contracts\Contract;
use App\Domain\Repositories\RepositoryEloquent;
use App\Models\ServiceType;

class ServiceTypeRepositoryEloquent implements ServiceTypeRepositoryInterface
{
    use RepositoryEloquent;

    protected ServiceType $model;

    public function __construct(ServiceType $serviceType)
    {
        $this->model    =   $serviceType;
    }
}
