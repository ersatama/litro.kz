<?php

namespace App\Domain\Repositories\InsuranceCompanyRequestLog;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\InsuranceCompanyRequestLog;

class InsuranceCompanyRequestLogRepositoryEloquent implements InsuranceCompanyRequestLogRepositoryInterface
{
    use MainRepositoryEloquent;
    protected InsuranceCompanyRequestLog $model;
    public function __construct(InsuranceCompanyRequestLog $insuranceCompanyRequestLog)
    {
        $this->model    =   $insuranceCompanyRequestLog;
    }
}
