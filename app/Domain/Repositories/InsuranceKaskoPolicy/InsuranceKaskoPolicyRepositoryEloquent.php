<?php

namespace App\Domain\Repositories\InsuranceKaskoPolicy;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\InsuranceKaskoPolicy;

class InsuranceKaskoPolicyRepositoryEloquent implements InsuranceKaskoPolicyRepositoryInterface
{
    use RepositoryEloquent;
    protected InsuranceKaskoPolicy $model;
    public function __construct(InsuranceKaskoPolicy $insuranceKaskoPolicy)
    {
        $this->model    =   $insuranceKaskoPolicy;
    }

    public static function count()
    {
        return InsuranceKaskoPolicy::count();
    }
}
