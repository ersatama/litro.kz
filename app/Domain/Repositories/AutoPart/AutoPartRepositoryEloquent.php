<?php

namespace App\Domain\Repositories\AutoPart;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\AutoPart;

class AutoPartRepositoryEloquent implements AutoPartRepositoryInterface
{
    use RepositoryEloquent;

    protected AutoPart $model;

    public function __construct(AutoPart $autoPart)
    {
        $this->model    =   $autoPart;
    }
}
