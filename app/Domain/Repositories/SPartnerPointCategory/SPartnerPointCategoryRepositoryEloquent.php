<?php

namespace App\Domain\Repositories\SPartnerPointCategory;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\SPartnerPointCategory;

class SPartnerPointCategoryRepositoryEloquent implements SPartnerPointCategoryRepositoryInterface
{
    use MainRepositoryEloquent;
    protected SPartnerPointCategory $model;
    public function __construct(SPartnerPointCategory $SPartnerPointCategory)
    {
        $this->model    =   $SPartnerPointCategory;
    }
}
