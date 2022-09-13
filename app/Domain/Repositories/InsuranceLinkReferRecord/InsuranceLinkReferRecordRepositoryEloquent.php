<?php

namespace App\Domain\Repositories\InsuranceLinkReferRecord;

use App\Domain\Repositories\MainRepositoryEloquent;
use App\Models\InsuranceLinkReferRecord;

class InsuranceLinkReferRecordRepositoryEloquent implements InsuranceLinkReferRecordRepositoryInterface
{
    use MainRepositoryEloquent;
    protected InsuranceLinkReferRecord $model;
    public function __construct(InsuranceLinkReferRecord $insuranceLinkReferRecord)
    {
        $this->model    =   $insuranceLinkReferRecord;
    }
}
