<?php

namespace App\Domain\Repositories\LawyerContact;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\LawyerContact;

class LawyerContactRepositoryEloquent implements LawyerContactRepositoryInterface
{
    use MainRepositoryEloquent;
    protected LawyerContact $model;
    public function __construct(LawyerContact $lawyerContact)
    {
        $this->model    =   $lawyerContact;
    }
}
