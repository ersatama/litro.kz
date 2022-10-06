<?php

namespace App\Domain\Repositories\InsuranceCompanyRequestLog;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\InsuranceCompanyRequestLog;

class InsuranceCompanyRequestLogRepositoryEloquent implements InsuranceCompanyRequestLogRepositoryInterface
{
    use RepositoryEloquent;
    protected InsuranceCompanyRequestLog $model;
    public function __construct(InsuranceCompanyRequestLog $insuranceCompanyRequestLog)
    {
        $this->model    =   $insuranceCompanyRequestLog;
    }
}
