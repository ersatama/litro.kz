<?php

namespace App\Domain\Repositories\InsuranceSelect;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\InsuranceSelect;

class InsuranceSelectRepositoryEloquent implements InsuranceSelectRepositoryInterface
{
    use RepositoryEloquent;
    protected InsuranceSelect $model;
    public function __construct(InsuranceSelect $insuranceSelect)
    {
        $this->model    =   $insuranceSelect;
    }
}
