<?php

namespace App\Domain\Repositories\SPartnerPointCategory;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\SPartnerPointCategory;

class SPartnerPointCategoryRepositoryEloquent implements SPartnerPointCategoryRepositoryInterface
{
    use RepositoryEloquent;
    protected SPartnerPointCategory $model;
    public function __construct(SPartnerPointCategory $SPartnerPointCategory)
    {
        $this->model    =   $SPartnerPointCategory;
    }
}
