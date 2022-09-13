<?php

namespace App\Domain\Repositories\InsuranceKaskoPolicy;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\InsuranceKaskoPolicy;

class InsuranceKaskoPolicyRepositoryEloquent implements InsuranceKaskoPolicyRepositoryInterface
{
    use MainRepositoryEloquent;
    protected InsuranceKaskoPolicy $model;
    public function __construct(InsuranceKaskoPolicy $insuranceKaskoPolicy)
    {
        $this->model    =   $insuranceKaskoPolicy;
    }
}
