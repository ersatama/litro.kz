<?php

namespace App\Domain\Repositories\Card;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\Card;

class CardRepositoryEloquent implements CardRepositoryInterface
{
    use MainRepositoryEloquent;

    protected Card $model;

    public function __construct(Card $card)
    {
        $this->model    =   $card;
    }
}
