<?php

namespace App\Domain\Repositories\InsuranceCategory;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\InsuranceCategory;

class InsuranceCategoryRepositoryEloquent implements InsuranceCategoryRepositoryInterface
{
    use MainRepositoryEloquent;
    protected InsuranceCategory $model;
    public function __construct(InsuranceCategory $insuranceCategory)
    {
        $this->model    =   $insuranceCategory;
    }
}
