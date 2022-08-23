<?php

namespace App\Domain\Repositories\Driver;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\Driver;

class DriverRepositoryEloquent implements DriverRepositoryInterface
{
    use MainRepositoryEloquent;
    protected Driver $model;
    public function __construct(Driver $driver)
    {
        $this->model    =   $driver;
    }
}
