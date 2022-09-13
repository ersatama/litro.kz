<?php

namespace App\Domain\Services;

use App\Domain\Repositories\InsuranceLinkReferRecord\InsuranceLinkReferRecordRepositoryInterface;

class InsuranceLinkReferRecordService extends MainService
{
    public InsuranceLinkReferRecordRepositoryInterface $insuranceLinkReferRecordRepository;
    public function __construct(InsuranceLinkReferRecordRepositoryInterface $insuranceLinkReferRecordRepository)
    {
        $this->insuranceLinkReferRecordRepository   =   $insuranceLinkReferRecordRepository;
    }
}
