<?php

namespace App\Domain\Repositories\Gift;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\Gift;

class GiftRepositoryEloquent implements GiftRepositoryInterface
{
    use RepositoryEloquent;
    protected Gift $model;
    public function __construct(Gift $gift)
    {
        $this->model    =   $gift;
    }
}
