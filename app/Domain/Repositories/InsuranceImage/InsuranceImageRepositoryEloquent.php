<?php

namespace App\Domain\Repositories\InsuranceImage;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\InsuranceImage;

class InsuranceImageRepositoryEloquent implements InsuranceImageRepositoryInterface
{
    use RepositoryEloquent;
    protected InsuranceImage $model;
    public function __construct(InsuranceImage $insuranceImage)
    {
        $this->model    =   $insuranceImage;
    }
}
