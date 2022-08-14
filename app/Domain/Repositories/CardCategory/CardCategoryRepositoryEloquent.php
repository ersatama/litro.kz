<?php

namespace App\Domain\Repositories\CardCategory;

use App\Models\CardCategory;

class CardCategoryRepositoryEloquent implements CardCategoryRepositoryInterface
{
    public function get($skip,$take)
    {
        return CardCategory::skip($skip)->take($take)->get();
    }

    public function count($where)
    {
        return CardCategory::where($where)->count();
    }

}
