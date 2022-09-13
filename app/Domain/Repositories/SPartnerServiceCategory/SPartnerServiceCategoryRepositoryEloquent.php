<?php

namespace App\Domain\Repositories\SPartnerServiceCategory;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\SPartnerServiceCategory;

class SPartnerServiceCategoryRepositoryEloquent implements SPartnerServiceCategoryRepositoryInterface
{
    use MainRepositoryEloquent;
    protected SPartnerServiceCategory $model;
    public function __construct(SPartnerServiceCategory $SPartnerServiceCategory)
    {
        $this->model    =   $SPartnerServiceCategory;
    }
}
