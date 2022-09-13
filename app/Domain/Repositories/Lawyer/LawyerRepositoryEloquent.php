<?php

namespace App\Domain\Repositories\Lawyer;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\Lawyer;

class LawyerRepositoryEloquent implements LawyerRepositoryInterface
{
    use MainRepositoryEloquent;
    protected Lawyer $model;
    public function __construct(Lawyer $lawyer)
    {
        $this->model    =   $lawyer;
    }
}
