<?php

namespace App\Domain\Services;

use App\Domain\Repositories\SPartnerPointWalletRecord\SPartnerPointWalletRecordRepositoryInterface;

class SPartnerPointWalletRecordService extends MainService
{
    public SPartnerPointWalletRecordRepositoryInterface $SPartnerPointWalletRecordRepository;
    public function __construct(SPartnerPointWalletRecordRepositoryInterface $SPartnerPointWalletRecordRepository)
    {
        $this->SPartnerPointWalletRecordRepository  =   $SPartnerPointWalletRecordRepository;
    }
}
