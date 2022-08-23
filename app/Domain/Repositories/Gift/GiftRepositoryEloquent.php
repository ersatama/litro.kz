<?php

namespace App\Domain\Repositories\Gift;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\Gift;

class GiftRepositoryEloquent implements GiftRepositoryInterface
{
    use MainRepositoryEloquent;
    protected Gift $model;
    public function __construct(Gift $gift)
    {
        $this->model    =   $gift;
    }
}
