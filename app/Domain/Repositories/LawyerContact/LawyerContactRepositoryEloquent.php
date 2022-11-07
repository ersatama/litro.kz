<?php

namespace App\Domain\Repositories\LawyerContact;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\LawyerContact;

class LawyerContactRepositoryEloquent implements LawyerContactRepositoryInterface
{
    use RepositoryEloquent;
    protected LawyerContact $model;
    public function __construct(LawyerContact $lawyerContact)
    {
        $this->model    =   $lawyerContact;
    }
}
