<?php

namespace App\Domain\Repositories\SPartnerPointRequisite;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\SPartnerPointRequisite;

class SPartnerPointRequisiteRepositoryEloquent implements SPartnerPointRequisiteRepositoryInterface
{
    use MainRepositoryEloquent;
    protected SPartnerPointRequisite $model;
    public function __construct(SPartnerPointRequisite $SPartnerPointRequisite)
    {
        $this->model    =   $SPartnerPointRequisite;
    }
}
