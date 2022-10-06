<?php

namespace App\Domain\Repositories\CardCategory;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\CardCategory;

class CardCategoryRepositoryEloquent implements CardCategoryRepositoryInterface
{
    use RepositoryEloquent;

    protected CardCategory $model;

    public function __construct(CardCategory $cardCategory)
    {
        $this->model    =   $cardCategory;
    }
}
