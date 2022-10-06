<?php

namespace App\Domain\Repositories\ServiceLimit;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\ServiceLimit;

class ServiceLimitRepositoryEloquent implements ServiceLimitRepositoryInterface
{
    use RepositoryEloquent;

    protected ServiceLimit $model;

    public function __construct(ServiceLimit $serviceLimit)
    {
        $this->model    =   $serviceLimit;
    }
}
