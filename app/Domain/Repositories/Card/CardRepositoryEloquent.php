<?php

namespace App\Domain\Repositories\Card;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\Card;

class CardRepositoryEloquent implements CardRepositoryInterface
{
    use RepositoryEloquent;

    protected Card $model;

    public function __construct(Card $card)
    {
        $this->model    =   $card;
    }
}
