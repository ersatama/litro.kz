<?php

namespace App\Domain\Repositories\ServiceLimit;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\ServiceLimit;

class ServiceLimitRepositoryEloquent implements ServiceLimitRepositoryInterface
{
    use MainRepositoryEloquent;

    protected ServiceLimit $model;

    public function __construct(ServiceLimit $serviceLimit)
    {
        $this->model    =   $serviceLimit;
    }
}
