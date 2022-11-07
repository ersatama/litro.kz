<?php

namespace App\Domain\Repositories\AutoPartParamOption;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\AutoPartParamOption;

class AutoPartParamOptionRepositoryEloquent implements AutoPartParamOptionRepositoryInterface
{
    use RepositoryEloquent;

    protected AutoPartParamOption $model;

    public function __construct(AutoPartParamOption $autoPartParamOption)
    {
        $this->model    =   $autoPartParamOption;
    }
}
