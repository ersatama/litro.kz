<?php

namespace App\Domain\Repositories\InsuranceSelectOption;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\InsuranceSelectOption;

class InsuranceSelectOptionRepositoryEloquent implements InsuranceSelectOptionRepositoryInterface
{
    use MainRepositoryEloquent;
    protected InsuranceSelectOption $model;
    public function __construct(InsuranceSelectOption $insuranceSelectOption)
    {
        $this->model    =   $insuranceSelectOption;
    }
}
