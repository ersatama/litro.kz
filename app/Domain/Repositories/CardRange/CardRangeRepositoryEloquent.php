<?php

namespace App\Domain\Repositories\CardRange;

use App\Models\CardRange;
use App\Domain\Repositories\RepositoryEloquent;

class CardRangeRepositoryEloquent implements CardRangeRepositoryInterface
{
    use RepositoryEloquent;

    protected CardRange $model;

    public function __construct(CardRange $cardRange)
    {
        $this->model    =   $cardRange;
    }
}
