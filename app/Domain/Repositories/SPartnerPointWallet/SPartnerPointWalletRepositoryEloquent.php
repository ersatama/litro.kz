<?php

namespace App\Domain\Repositories\SPartnerPointWallet;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\SPartnerPointWallet;

class SPartnerPointWalletRepositoryEloquent implements SPartnerPointWalletRepositoryInterface
{
    use MainRepositoryEloquent;
    protected SPartnerPointWallet $model;
    public function __construct(SPartnerPointWallet $SPartnerPointWallet)
    {
        $this->model    =   $SPartnerPointWallet;
    }
}
