<?php

namespace App\Domain\Repositories\Service;

use App\Domain\Contracts\MainContract;
use App\Models\Service;

class ServiceRepositoryEloquent implements ServiceRepositoryInterface
{
    public function get()
    {
        return Service::get();
    }

    public function getById($id)
    {
        return Service::where(MainContract::ID,$id)->first();
    }

}
