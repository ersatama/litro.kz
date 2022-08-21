<?php

namespace App\Domain\Repositories\Region;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\Region;

class RegionRepositoryEloquent implements RegionRepositoryInterface
{
    use MainRepositoryEloquent;

    protected Region $model;

    public function __construct(Region $region)
    {
        $this->model    =   $region;
    }
}
