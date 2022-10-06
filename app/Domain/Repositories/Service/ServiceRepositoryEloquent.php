<?php

namespace App\Domain\Repositories\Service;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\Service;

class ServiceRepositoryEloquent implements ServiceRepositoryInterface
{
    use RepositoryEloquent;

    protected Service $model;

    public function __construct(Service $service)
    {
        $this->model    =   $service;
    }
}
