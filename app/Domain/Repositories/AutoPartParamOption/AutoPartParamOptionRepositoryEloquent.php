<?php

namespace App\Domain\Repositories\AutoPartParamOption;

use App\Models\AutoPartParamOption;

class AutoPartParamOptionRepositoryEloquent implements AutoPartParamOptionRepositoryInterface
{
    public function get()
    {
        return AutoPartParamOption::get();
    }
}
