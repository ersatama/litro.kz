<?php

namespace App\Domain\Repositories\AutoPartCategory;

use App\Models\AutoPartCategory;

class AutoPartCategoryRepositoryEloquent implements AutoPartCategoryRepositoryInterface
{
    public function get()
    {
        return AutoPartCategory::get();
    }
}
