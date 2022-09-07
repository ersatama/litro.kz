<?php

namespace App\Domain\Services;

use App\Domain\Repositories\WalletRecord\WalletRecordRepositoryInterface;

class WalletRecordService extends MainService
{
    public WalletRecordRepositoryInterface $walletRecordRepository;
    public function __construct(WalletRecordRepositoryInterface $walletRecordRepository)
    {
        $this->walletRecordRepository   =   $walletRecordRepository;
    }
}
