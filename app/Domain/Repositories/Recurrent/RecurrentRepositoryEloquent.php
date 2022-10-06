<?php

namespace App\Domain\Repositories\Recurrent;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\Recurrent;

class RecurrentRepositoryEloquent implements RecurrentRepositoryInterface
{
    use RepositoryEloquent;
    protected Recurrent $model;
    public function __construct(Recurrent $recurrent)
    {
        $this->model    =   $recurrent;
    }
}
