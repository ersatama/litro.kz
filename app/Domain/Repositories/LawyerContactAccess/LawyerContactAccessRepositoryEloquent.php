<?php

namespace App\Domain\Repositories\LawyerContactAccess;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\LawyerContactAccess;

class LawyerContactAccessRepositoryEloquent implements LawyerContactAccessRepositoryInterface
{
    use RepositoryEloquent;
    protected LawyerContactAccess $model;
    public function __construct(LawyerContactAccess $lawyerContactAccess)
    {
        $this->model    =   $lawyerContactAccess;
    }
}
