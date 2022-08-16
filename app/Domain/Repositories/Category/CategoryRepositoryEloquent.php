<?php

namespace App\Domain\Repositories\Category;

use App\Domain\Contracts\MainContract;
use App\Models\Category;

class CategoryRepositoryEloquent implements CategoryRepositoryInterface
{
    public function get($skip,$take)
    {
        return Category::skip($skip)->take($take)->get();
    }

    public function count($where)
    {
        return Category::where($where)->count();
    }

    public function getById($id)
    {
        return Category::where(MainContract::ID,$id)->first();
    }
}
