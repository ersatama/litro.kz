<?php

namespace App\Domain\Repositories\Wallet;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\Wallet;

class WalletRepositoryEloquent implements WalletRepositoryInterface
{
    use RepositoryEloquent;
    protected Wallet $model;
    public function __construct(Wallet $wallet)
    {
        $this->model    =   $wallet;
    }

    public static function count()
    {
        return Wallet::count();
    }
}
