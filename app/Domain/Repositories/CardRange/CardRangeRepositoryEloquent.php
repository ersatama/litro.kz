<?php

namespace App\Domain\Repositories\CardRange;

use App\Models\CardRange;
use App\Domain\Repositories\MainRepositoryEloquent;

class CardRangeRepositoryEloquent implements CardRangeRepositoryInterface
{
    use MainRepositoryEloquent;

    protected CardRange $model;

    public function __construct(CardRange $cardRange)
    {
        $this->model    =   $cardRange;
    }
}
