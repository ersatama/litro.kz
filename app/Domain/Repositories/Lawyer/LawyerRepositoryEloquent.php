<?php

namespace App\Domain\Repositories\Lawyer;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\Lawyer;

class LawyerRepositoryEloquent implements LawyerRepositoryInterface
{
    use RepositoryEloquent;
    protected Lawyer $model;
    public function __construct(Lawyer $lawyer)
    {
        $this->model    =   $lawyer;
    }
}
