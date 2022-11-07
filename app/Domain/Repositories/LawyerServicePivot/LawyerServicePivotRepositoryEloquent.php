<?php

namespace App\Domain\Repositories\LawyerServicePivot;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\LawyerServicePivot;

class LawyerServicePivotRepositoryEloquent implements LawyerServicePivotRepositoryInterface
{
    use RepositoryEloquent;
    protected LawyerServicePivot $model;
    public function __construct(LawyerServicePivot $lawyerServicePivot)
    {
        $this->model    =   $lawyerServicePivot;
    }
}
