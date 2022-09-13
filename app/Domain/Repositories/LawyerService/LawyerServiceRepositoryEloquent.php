<?php

namespace App\Domain\Repositories\LawyerService;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\LawyerService;

class LawyerServiceRepositoryEloquent implements LawyerServiceRepositoryInterface
{
    use MainRepositoryEloquent;
    protected LawyerService $model;
    public function __construct(LawyerService $lawyerService)
    {
        $this->model    =   $lawyerService;
    }
}
