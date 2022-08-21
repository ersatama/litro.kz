<?php

namespace App\Domain\Repositories\AutoPartParam;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\AutoPartParam;

class AutoPartParamRepositoryEloquent implements AutoPartParamRepositoryInterface
{
    use MainRepositoryEloquent;

    protected AutoPartParam $model;

    public function __construct(AutoPartParam $autoPartParam)
    {
        $this->model    =   $autoPartParam;
    }
}
