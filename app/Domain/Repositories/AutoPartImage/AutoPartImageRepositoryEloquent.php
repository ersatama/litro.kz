<?php

namespace App\Domain\Repositories\AutoPartImage;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\AutoPartImage;

class AutoPartImageRepositoryEloquent implements AutoPartImageRepositoryInterface
{
    use RepositoryEloquent;
    protected AutoPartImage $model;
    public function __construct(AutoPartImage $autoPartImage)
    {
        $this->model    =   $autoPartImage;
    }
}
