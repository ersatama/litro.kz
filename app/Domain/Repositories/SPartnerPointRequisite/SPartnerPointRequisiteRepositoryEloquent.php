<?php

namespace App\Domain\Repositories\SPartnerPointRequisite;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\SPartnerPointRequisite;

class SPartnerPointRequisiteRepositoryEloquent implements SPartnerPointRequisiteRepositoryInterface
{
    use RepositoryEloquent;
    protected SPartnerPointRequisite $model;
    public function __construct(SPartnerPointRequisite $SPartnerPointRequisite)
    {
        $this->model    =   $SPartnerPointRequisite;
    }
}
