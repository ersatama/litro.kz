<?php

namespace App\Domain\Repositories\Partner;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\Partner;

class PartnerRepositoryEloquent implements PartnerRepositoryInterface
{
    use MainRepositoryEloquent;
    protected Partner $model;
    public function __construct(Partner $partner)
    {
        $this->model    =   $partner;
    }
}
