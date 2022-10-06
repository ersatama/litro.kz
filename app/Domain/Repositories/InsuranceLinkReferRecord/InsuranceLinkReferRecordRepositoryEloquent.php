<?php

namespace App\Domain\Repositories\InsuranceLinkReferRecord;

use App\Domain\Repositories\RepositoryEloquent;
use App\Models\InsuranceLinkReferRecord;

class InsuranceLinkReferRecordRepositoryEloquent implements InsuranceLinkReferRecordRepositoryInterface
{
    use RepositoryEloquent;
    protected InsuranceLinkReferRecord $model;
    public function __construct(InsuranceLinkReferRecord $insuranceLinkReferRecord)
    {
        $this->model    =   $insuranceLinkReferRecord;
    }
}
