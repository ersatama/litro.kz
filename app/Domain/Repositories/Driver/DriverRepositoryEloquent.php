<?php

namespace App\Domain\Repositories\Driver;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\Driver;

class DriverRepositoryEloquent implements DriverRepositoryInterface
{
    use RepositoryEloquent;
    protected Driver $model;
    public function __construct(Driver $driver)
    {
        $this->model    =   $driver;
    }
}
