<?php

namespace App\Domain\Repositories\LawyerService;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\LawyerService;

class LawyerServiceRepositoryEloquent implements LawyerServiceRepositoryInterface
{
    use RepositoryEloquent;
    protected LawyerService $model;
    public function __construct(LawyerService $lawyerService)
    {
        $this->model    =   $lawyerService;
    }
}
