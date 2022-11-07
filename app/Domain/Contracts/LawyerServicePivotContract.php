<?php

namespace App\Domain\Contracts;

class LawyerServicePivotContract extends Contract
{
    const TABLE =   'lawyer_service_pivots';
    const FILLABLE  =   [
        self::LAWYER_ID,
        self::LAWYER_SERVICE_ID,
    ];
}
