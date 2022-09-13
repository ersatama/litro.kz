<?php

namespace App\Domain\Contracts;

class InsuranceCompanyRequestLogContract extends MainContract
{
    const TABLE =   'insurance_company_request_logs';
    const FILLABLE  =   [
        self::INSURANCE_COMPANY_ID,
        self::INSURANCE_COMPANY_REQUEST_TYPE,
        self::ACTION_TYPE,
        self::REQUEST_URL,
        self::RESPONSE_STATUS,
        self::RESPONSE_BODY,
        self::REQUEST_BODY,
    ];
}
