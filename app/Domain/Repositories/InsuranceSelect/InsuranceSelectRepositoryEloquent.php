<?php

namespace App\Domain\Repositories\InsuranceSelect;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\InsuranceSelect;

class InsuranceSelectRepositoryEloquent implements InsuranceSelectRepositoryInterface
{
    use MainRepositoryEloquent;
    protected InsuranceSelect $model;
    public function __construct(InsuranceSelect $insuranceSelect)
    {
        $this->model    =   $insuranceSelect;
    }
}
