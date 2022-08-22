<?php

namespace App\Domain\Repositories\CityService;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Domain\Services\CityService;

class CityServiceRepositoryEloquent implements CityServiceRepositoryInterface
{
    use MainRepositoryEloquent;
    protected CityService $model;
    public function __construct(CityService $cityService)
    {
        $this->model    =   $cityService;
    }
}
