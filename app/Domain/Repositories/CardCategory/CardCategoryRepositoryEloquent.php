<?php

namespace App\Domain\Repositories\CardCategory;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\CardCategory;

class CardCategoryRepositoryEloquent implements CardCategoryRepositoryInterface
{
    use MainRepositoryEloquent;

    protected CardCategory $model;

    public function __construct(CardCategory $cardCategory)
    {
        $this->model    =   $cardCategory;
    }
}
