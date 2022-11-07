<?php

namespace App\Domain\Repositories\SPartnerPointWalletRecord;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\SPartnerPointWalletRecord;

class SPartnerPointWalletRecordRepositoryEloquent implements SPartnerPointWalletRecordRepositoryInterface
{
    use RepositoryEloquent;
    protected SPartnerPointWalletRecord $model;
    public function __construct(SPartnerPointWalletRecord $SPartnerPointWalletRecord)
    {
        $this->model    =   $SPartnerPointWalletRecord;
    }
}
