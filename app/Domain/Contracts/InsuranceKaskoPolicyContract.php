<?php

namespace App\Domain\Contracts;

class InsuranceKaskoPolicyContract extends MainContract
{
    const TABLE =   'insurance_kasko_policies';
    const FILLABLE  =   [
        self::USER_ID,
        self::USER_CAR_ID,
        self::INSURANCE_COMPANY_ID,
        self::STATUS,
        self::PRICE,
        self::BONUS,
        self::ERROR_MSG,
        self::POLICY_BODY,
        self::PRODUCTS,
        self::INSURANCE_PRICE,
    ];
}
