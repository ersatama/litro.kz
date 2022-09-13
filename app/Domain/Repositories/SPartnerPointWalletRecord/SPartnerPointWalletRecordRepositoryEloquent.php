<?php

namespace App\Domain\Repositories\SPartnerPointWalletRecord;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\SPartnerPointWalletRecord;

class SPartnerPointWalletRecordRepositoryEloquent implements SPartnerPointWalletRecordRepositoryInterface
{
    use MainRepositoryEloquent;
    protected SPartnerPointWalletRecord $model;
    public function __construct(SPartnerPointWalletRecord $SPartnerPointWalletRecord)
    {
        $this->model    =   $SPartnerPointWalletRecord;
    }
}
