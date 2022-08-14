<?php

namespace App\Domain\Repositories\News;

use App\Domain\Contracts\MainContract;
use App\Models\News;

class NewsRepositoryEloquent implements NewsRepositoryInterface
{
    public function count($where)
    {
        return News::where($where)->count();
    }

    public function get($skip,$take)
    {
        return News::skip($skip)->take($take)->get();
    }

    public function getById($id)
    {
        return News::where(MainContract::ID,$id)
            ->first();
    }

}
