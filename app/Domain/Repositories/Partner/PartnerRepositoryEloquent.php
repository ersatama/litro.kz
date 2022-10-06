<?php

namespace App\Domain\Repositories\Partner;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\Partner;

class PartnerRepositoryEloquent implements PartnerRepositoryInterface
{
    use RepositoryEloquent;
    protected Partner $model;
    public function __construct(Partner $partner)
    {
        $this->model    =   $partner;
    }
}
