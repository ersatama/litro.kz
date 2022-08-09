<?php

namespace App\Domain\Repositories\CarCategory;

use App\Models\CarCategory;

class CarCategoryRepositoryEloquent implements CarCategoryRepositoryInterface
{
    public function get()
    {
        return CarCategory::get();
    }
}
