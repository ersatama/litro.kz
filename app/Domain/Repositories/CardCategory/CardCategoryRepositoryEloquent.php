<?php

namespace App\Domain\Repositories\CardCategory;

use App\Models\CardCategory;

class CardCategoryRepositoryEloquent implements CardCategoryRepositoryInterface
{
    public function get()
    {
        return CardCategory::get();
    }
}
