<?php

namespace App\Domain\Repositories\AutoPartType;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\AutoPartType;

class AutoPartTypeRepositoryEloquent implements AutoPartTypeRepositoryInterface
{
    use RepositoryEloquent;

    protected AutoPartType $model;

    public function __construct(AutoPartType $autoPartType)
    {
        $this->model    =   $autoPartType;
    }
}
