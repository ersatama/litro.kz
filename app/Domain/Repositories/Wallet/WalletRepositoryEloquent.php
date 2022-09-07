<?php

namespace App\Domain\Repositories\Wallet;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\Wallet;

class WalletRepositoryEloquent implements WalletRepositoryInterface
{
    use MainRepositoryEloquent;
    protected Wallet $model;
    public function __construct(Wallet $wallet)
    {
        $this->model    =   $wallet;
    }
}
