<?php

namespace App\Domain\Repositories\InsuranceCompanyProduct;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\InsuranceCompanyProduct;

class InsuranceCompanyProductRepositoryEloquent implements InsuranceCompanyProductRepositoryInterface
{
    use MainRepositoryEloquent;
    protected InsuranceCompanyProduct $model;
    public function __construct(InsuranceCompanyProduct $insuranceCompanyProduct)
    {
        $this->model    =   $insuranceCompanyProduct;
    }
}
