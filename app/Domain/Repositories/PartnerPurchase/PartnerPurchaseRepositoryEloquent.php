<?php

namespace App\Domain\Repositories\PartnerPurchase;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\PartnerPurchase;

class PartnerPurchaseRepositoryEloquent implements PartnerPurchaseRepositoryInterface
{
    use MainRepositoryEloquent;
    protected PartnerPurchase $model;
    public function __construct(PartnerPurchase $partnerPurchase)
    {
        $this->model    =   $partnerPurchase;
    }
}
