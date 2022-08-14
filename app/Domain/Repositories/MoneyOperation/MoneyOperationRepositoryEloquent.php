<?php

namespace App\Domain\Repositories\MoneyOperation;

use App\Domain\Contracts\MainContract;
use App\Models\MoneyOperation;

class MoneyOperationRepositoryEloquent implements MoneyOperationRepositoryInterface
{
    public function get($skip,$take)
    {
        return MoneyOperation::skip($skip)->take($take)->get();
    }

    public function count($where)
    {
        return MoneyOperation::where($where)->count();
    }

    public function getById($id)
    {
        return MoneyOperation::where(MainContract::ID,$id)->first();
    }
}
