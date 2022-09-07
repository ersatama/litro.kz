<?php

namespace App\Domain\Repositories\WalletRecord;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\WalletRecord;

class WalletRecordRepositoryEloquent implements WalletRecordRepositoryInterface
{
    use MainRepositoryEloquent;
    protected WalletRecord $model;
    public function __construct(WalletRecord $walletRecord)
    {
        $this->model    =   $walletRecord;
    }
}
