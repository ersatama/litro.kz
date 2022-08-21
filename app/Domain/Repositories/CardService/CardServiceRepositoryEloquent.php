<?php

namespace App\Domain\Repositories\CardService;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\CardService;

class CardServiceRepositoryEloquent implements CardServiceRepositoryInterface
{
    use MainRepositoryEloquent;

    protected CardService $model;

    public function __construct(CardService $cardService)
    {
        $this->model    =   $cardService;
    }
}
