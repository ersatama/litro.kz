<?php

namespace App\Domain\Services;

use App\Domain\Repositories\Wallet\WalletRepositoryInterface;

class WalletService extends MainService
{
    public WalletRepositoryInterface $walletRepository;
    public function __construct(WalletRepositoryInterface $walletRepository)
    {
        $this->walletRepository =   $walletRepository;
    }
}
