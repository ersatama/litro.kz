<?php

namespace App\Domain\Repositories\AutoPart;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\AutoPart;

class AutoPartRepositoryEloquent implements AutoPartRepositoryInterface
{
    use MainRepositoryEloquent;

    protected AutoPart $model;

    public function __construct(AutoPart $autoPart)
    {
        $this->model    =   $autoPart;
    }
}
