<?php

namespace App\Domain\Repositories\AutoPartType;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\AutoPartType;

class AutoPartTypeRepositoryEloquent implements AutoPartTypeRepositoryInterface
{
    use MainRepositoryEloquent;

    protected AutoPartType $model;

    public function __construct(AutoPartType $autoPartType)
    {
        $this->model    =   $autoPartType;
    }
}
