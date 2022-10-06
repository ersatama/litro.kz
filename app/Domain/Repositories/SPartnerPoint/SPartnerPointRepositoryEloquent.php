<?php

namespace App\Domain\Repositories\SPartnerPoint;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\SPartnerPoint;

class SPartnerPointRepositoryEloquent implements SPartnerPointRepositoryInterface
{
    use RepositoryEloquent;
    protected SPartnerPoint $model;
    public function __construct(SPartnerPoint $SPartnerPoint)
    {
        $this->model    =   $SPartnerPoint;
    }
}
