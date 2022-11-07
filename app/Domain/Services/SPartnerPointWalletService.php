<?php

namespace App\Domain\Services;

use App\Domain\Repositories\SPartnerPointWallet\SPartnerPointWalletRepositoryInterface;

class SPartnerPointWalletService extends MainService
{
    public SPartnerPointWalletRepositoryInterface $SPartnerPointWalletRepository;
    public function __construct(SPartnerPointWalletRepositoryInterface $SPartnerPointWalletRepository)
    {
        $this->SPartnerPointWalletRepository    =   $SPartnerPointWalletRepository;
    }
}
