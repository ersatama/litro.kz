<?php

namespace App\Domain\Repositories\Image;

use App\Domain\Contracts\MainContract;
use App\Models\Image;

class ImageRepositoryEloquent implements ImageRepositoryInterface
{
    public function count($where)
    {
        return Image::where($where)->count();
    }

    public function get($skip,$take)
    {
        return Image::skip($skip)->take($take)->get();
    }

    public function getByUserId($userId,$skip,$take)
    {
        return Image::where(MainContract::USER_ID,$userId)
            ->skip($skip)
            ->take($take)
            ->get();
    }

    public function getById($id)
    {
        return Image::where(MainContract::ID,$id)->first();
    }
}
