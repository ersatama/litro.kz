<?php

namespace App\Domain\Repositories\InsuranceCompanyProduct;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\InsuranceCompanyProduct;

class InsuranceCompanyProductRepositoryEloquent implements InsuranceCompanyProductRepositoryInterface
{
    use RepositoryEloquent;
    protected InsuranceCompanyProduct $model;
    public function __construct(InsuranceCompanyProduct $insuranceCompanyProduct)
    {
        $this->model    =   $insuranceCompanyProduct;
    }
}
