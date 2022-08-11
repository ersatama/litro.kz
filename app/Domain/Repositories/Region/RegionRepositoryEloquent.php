<?php

namespace App\Domain\Repositories\Region;

use App\Models\Region;

class RegionRepositoryEloquent implements RegionRepositoryInterface
{
    public function get()
    {
        return Region::get();
    }
}
