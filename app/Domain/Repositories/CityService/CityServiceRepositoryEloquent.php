<?php

namespace App\Domain\Repositories\CityService;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\CityService;

class CityServiceRepositoryEloquent implements CityServiceRepositoryInterface
{
    use RepositoryEloquent;
    protected CityService $model;
    public function __construct(CityService $cityService)
    {
        $this->model    =   $cityService;
    }
}
