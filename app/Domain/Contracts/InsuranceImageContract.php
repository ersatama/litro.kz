<?php

namespace App\Domain\Contracts;

class InsuranceImageContract extends Contract
{
    const TABLE =   'insurance_images';
    const FILLABLE  =   [
        self::USER_ID,
        self::INSURANCE_COMPANY_ID,
        self::POLICY_ID,
        self::IMAGE_ID,
        self::TYPE,
    ];
}
