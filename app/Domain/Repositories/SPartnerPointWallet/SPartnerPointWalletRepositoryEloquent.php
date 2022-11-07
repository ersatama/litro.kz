<?php

namespace App\Domain\Repositories\SPartnerPointWallet;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\SPartnerPointWallet;

class SPartnerPointWalletRepositoryEloquent implements SPartnerPointWalletRepositoryInterface
{
    use RepositoryEloquent;
    protected SPartnerPointWallet $model;
    public function __construct(SPartnerPointWallet $SPartnerPointWallet)
    {
        $this->model    =   $SPartnerPointWallet;
    }
}
