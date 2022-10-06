<?php

namespace App\Domain\Repositories\SPartnerServiceCategory;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\SPartnerServiceCategory;

class SPartnerServiceCategoryRepositoryEloquent implements SPartnerServiceCategoryRepositoryInterface
{
    use RepositoryEloquent;
    protected SPartnerServiceCategory $model;
    public function __construct(SPartnerServiceCategory $SPartnerServiceCategory)
    {
        $this->model    =   $SPartnerServiceCategory;
    }
}
