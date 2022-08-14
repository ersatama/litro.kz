<?php

namespace App\Domain\Repositories\MoneyOperationType;

use App\Domain\Contracts\MainContract;
use App\Models\MoneyOperationType;

class MoneyOperationTypeRepositoryEloquent implements MoneyOperationTypeRepositoryInterface
{
    public function get($skip,$take)
    {
        return MoneyOperationType::skip($skip)->take($take)->get();
    }

    public function count($where)
    {
        return MoneyOperationType::where($where)->count();
    }

    public function getById($id)
    {
        return MoneyOperationType::where(MainContract::ID,$id)->first();
    }
}
