<?php

namespace App\Domain\Repositories\Recurrent;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\Recurrent;

class RecurrentRepositoryEloquent implements RecurrentRepositoryInterface
{
    use MainRepositoryEloquent;
    protected Recurrent $model;
    public function __construct(Recurrent $recurrent)
    {
        $this->model    =   $recurrent;
    }
}
