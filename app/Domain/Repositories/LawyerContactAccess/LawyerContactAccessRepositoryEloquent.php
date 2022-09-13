<?php

namespace App\Domain\Repositories\LawyerContactAccess;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\LawyerContactAccess;

class LawyerContactAccessRepositoryEloquent implements LawyerContactAccessRepositoryInterface
{
    use MainRepositoryEloquent;
    protected LawyerContactAccess $model;
    public function __construct(LawyerContactAccess $lawyerContactAccess)
    {
        $this->model    =   $lawyerContactAccess;
    }
}
