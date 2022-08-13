<?php

namespace App\Domain\Repositories\ServiceType;

use App\Domain\Contracts\MainContract;
use App\Models\ServiceType;

class ServiceTypeRepositoryEloquent implements ServiceTypeRepositoryInterface
{
    public function get()
    {
        return ServiceType::get();
    }

    public function getById($id)
    {
        return ServiceType::where(MainContract::ID,$id)->first();
    }

}
