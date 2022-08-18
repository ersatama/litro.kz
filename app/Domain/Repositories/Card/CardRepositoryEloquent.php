<?php

namespace App\Domain\Repositories\Card;

use App\Domain\Contracts\MainContract;
use App\Models\Card;

class CardRepositoryEloquent implements CardRepositoryInterface
{
    public function count($where)
    {
        return Card::where($where)->count();
    }

    public function get($skip,$take)
    {
        return Card::skip($skip)->take($take)->get();
    }

    public function getByUserId($userId,$skip,$take)
    {
        return Card::where(MainContract::USER_ID,$userId)->skip($skip)->take($take)->get();
    }

    public function getById($id)
    {
        return Card::where(MainContract::ID,$id)->first();
    }
}
