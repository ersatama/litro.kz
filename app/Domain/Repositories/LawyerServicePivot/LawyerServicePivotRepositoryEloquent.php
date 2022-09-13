<?php

namespace App\Domain\Repositories\LawyerServicePivot;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\LawyerServicePivot;

class LawyerServicePivotRepositoryEloquent implements LawyerServicePivotRepositoryInterface
{
    use MainRepositoryEloquent;
    protected LawyerServicePivot $model;
    public function __construct(LawyerServicePivot $lawyerServicePivot)
    {
        $this->model    =   $lawyerServicePivot;
    }
}
