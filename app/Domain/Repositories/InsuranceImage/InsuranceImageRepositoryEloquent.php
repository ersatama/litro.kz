<?php

namespace App\Domain\Repositories\InsuranceImage;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\InsuranceImage;

class InsuranceImageRepositoryEloquent implements InsuranceImageRepositoryInterface
{
    use MainRepositoryEloquent;
    protected InsuranceImage $model;
    public function __construct(InsuranceImage $insuranceImage)
    {
        $this->model    =   $insuranceImage;
    }
}
