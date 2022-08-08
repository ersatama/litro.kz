<?php

namespace App\Domain\Repositories\News;

use App\Domain\Contracts\MainContract;
use App\Models\News;

class NewsRepositoryEloquent implements NewsRepositoryInterface
{
    public function get()
    {
        return News::get();
    }

    public function getById($id)
    {
        return News::where(MainContract::ID,$id)
            ->first();
    }

}
