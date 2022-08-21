<?php

namespace App\Domain\Repositories\AutoPartParamOption;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\AutoPartParamOption;

class AutoPartParamOptionRepositoryEloquent implements AutoPartParamOptionRepositoryInterface
{
    use MainRepositoryEloquent;

    protected AutoPartParamOption $model;

    public function __construct(AutoPartParamOption $autoPartParamOption)
    {
        $this->model    =   $autoPartParamOption;
    }
}
