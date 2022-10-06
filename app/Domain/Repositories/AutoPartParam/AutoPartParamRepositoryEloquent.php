<?php

namespace App\Domain\Repositories\AutoPartParam;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\AutoPartParam;

class AutoPartParamRepositoryEloquent implements AutoPartParamRepositoryInterface
{
    use RepositoryEloquent;

    protected AutoPartParam $model;

    public function __construct(AutoPartParam $autoPartParam)
    {
        $this->model    =   $autoPartParam;
    }
}
