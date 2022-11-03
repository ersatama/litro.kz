<?php

namespace App\Domain\Repositories\InsuranceCompany;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\InsuranceCompany;

class InsuranceCompanyRepositoryEloquent implements InsuranceCompanyRepositoryInterface
{
    use RepositoryEloquent;
    protected InsuranceCompany $model;
    public function __construct(InsuranceCompany $insuranceCompany)
    {
        $this->model    =   $insuranceCompany;
    }

    public static function count()
    {
        return InsuranceCompany::count();
    }
}
