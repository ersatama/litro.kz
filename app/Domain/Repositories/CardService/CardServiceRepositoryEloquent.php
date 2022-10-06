<?php

namespace App\Domain\Repositories\CardService;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\CardService;

class CardServiceRepositoryEloquent implements CardServiceRepositoryInterface
{
    use RepositoryEloquent;

    protected CardService $model;

    public function __construct(CardService $cardService)
    {
        $this->model    =   $cardService;
    }
}
