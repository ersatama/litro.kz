<?php

namespace App\Domain\Repositories\InsuranceCategory;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\InsuranceCategory;

class InsuranceCategoryRepositoryEloquent implements InsuranceCategoryRepositoryInterface
{
    use RepositoryEloquent;
    protected InsuranceCategory $model;
    public function __construct(InsuranceCategory $insuranceCategory)
    {
        $this->model    =   $insuranceCategory;
    }
}
