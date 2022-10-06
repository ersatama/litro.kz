<?php

namespace App\Domain\Repositories\InsuranceSelectOption;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\InsuranceSelectOption;

class InsuranceSelectOptionRepositoryEloquent implements InsuranceSelectOptionRepositoryInterface
{
    use RepositoryEloquent;
    protected InsuranceSelectOption $model;
    public function __construct(InsuranceSelectOption $insuranceSelectOption)
    {
        $this->model    =   $insuranceSelectOption;
    }
}
