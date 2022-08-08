<?php

namespace App\Domain\Repositories\AutoPartParam;

use App\Models\AutoPartParam;

class AutoPartParamRepositoryEloquent implements AutoPartParamRepositoryInterface
{
    public function get()
    {
        return AutoPartParam::get();
    }
}
