<?php

namespace App\Domain\Repositories\SPartnerPoint;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\SPartnerPoint;

class SPartnerPointRepositoryEloquent implements SPartnerPointRepositoryInterface
{
    use MainRepositoryEloquent;
    protected SPartnerPoint $model;
    public function __construct(SPartnerPoint $SPartnerPoint)
    {
        $this->model    =   $SPartnerPoint;
    }
}
