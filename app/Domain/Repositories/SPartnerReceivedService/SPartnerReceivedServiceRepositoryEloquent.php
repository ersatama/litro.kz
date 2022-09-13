<?php

namespace App\Domain\Repositories\SPartnerReceivedService;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\SPartnerReceivedService;

class SPartnerReceivedServiceRepositoryEloquent implements SPartnerReceivedServiceRepositoryInterface
{
    use MainRepositoryEloquent;
    protected SPartnerReceivedService $model;
    public function __construct(SPartnerReceivedService $SPartnerReceivedService)
    {
        $this->model    =   $SPartnerReceivedService;
    }
}
