<?php

namespace App\Domain\Repositories\Service;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\Service;

class ServiceRepositoryEloquent implements ServiceRepositoryInterface
{
    use MainRepositoryEloquent;

    protected Service $model;

    public function __construct(Service $service)
    {
        $this->model    =   $service;
    }
}
