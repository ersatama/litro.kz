<?php

namespace App\Domain\Repositories\ServicePrice;

use App\Domain\Contracts\MainContract;
use App\Models\ServicePrice;

class ServicePriceRepositoryEloquent implements ServicePriceRepositoryInterface
{
    public function get()
    {
        return ServicePrice::get();
    }

    public function getById($id)
    {
        return ServicePrice::where(MainContract::ID,$id)->first();
    }
}
