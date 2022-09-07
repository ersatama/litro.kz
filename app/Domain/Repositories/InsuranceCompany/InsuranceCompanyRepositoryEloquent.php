<?php

namespace App\Domain\Repositories\InsuranceCompany;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\InsuranceCompany;

class InsuranceCompanyRepositoryEloquent implements InsuranceCompanyRepositoryInterface
{
    use MainRepositoryEloquent;
    protected InsuranceCompany $model;
    public function __construct(InsuranceCompany $insuranceCompany)
    {
        $this->model    =   $insuranceCompany;
    }
}
