<?php

namespace App\Domain\Repositories\PartnerPurchase;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\PartnerPurchase;

class PartnerPurchaseRepositoryEloquent implements PartnerPurchaseRepositoryInterface
{
    use RepositoryEloquent;
    protected PartnerPurchase $model;
    public function __construct(PartnerPurchase $partnerPurchase)
    {
        $this->model    =   $partnerPurchase;
    }

    public static function count()
    {
        return PartnerPurchase::count();
    }
}
