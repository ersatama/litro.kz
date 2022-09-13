<?php

namespace App\Domain\Contracts;

class InsuranceImageContract extends MainContract
{
    const TABLE =   'insurance_images';
    const FILLABLE  =   [
        self::USER_ID,
        self::INSURANCE_COMPANY_ID,
        self::POLICY_ID,
        self::TYPE,
        self::KEY,
        self::EXTENSION,
    ];
}
