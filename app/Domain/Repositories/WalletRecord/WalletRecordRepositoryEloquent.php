<?php

namespace App\Domain\Repositories\WalletRecord;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\WalletRecord;

class WalletRecordRepositoryEloquent implements WalletRecordRepositoryInterface
{
    use RepositoryEloquent;
    protected WalletRecord $model;
    public function __construct(WalletRecord $walletRecord)
    {
        $this->model    =   $walletRecord;
    }
}
