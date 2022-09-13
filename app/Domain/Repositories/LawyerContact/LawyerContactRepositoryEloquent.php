<?php

namespace App\Domain\Repositories\LawyerContact;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\LawyerServicePivot;

class LawyerContactRepositoryEloquent implements LawyerContactRepositoryInterface
{
    use MainRepositoryEloquent;
    protected LawyerServicePivot $model;
    public function __construct(LawyerServicePivot $lawyerServicePivot)
    {
        $this->model    =   $lawyerServicePivot;
    }
}
