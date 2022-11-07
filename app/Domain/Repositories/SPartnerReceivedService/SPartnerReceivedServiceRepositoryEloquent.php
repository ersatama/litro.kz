<?php

namespace App\Domain\Repositories\SPartnerReceivedService;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\SPartnerReceivedService;

class SPartnerReceivedServiceRepositoryEloquent implements SPartnerReceivedServiceRepositoryInterface
{
    use RepositoryEloquent;
    protected SPartnerReceivedService $model;
    public function __construct(SPartnerReceivedService $SPartnerReceivedService)
    {
        $this->model    =   $SPartnerReceivedService;
    }
}
