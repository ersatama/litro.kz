<?php

namespace App\Domain\Contracts;

class InsuranceCompanyProductContract extends Contract
{
    const TABLE =   'insurance_company_products';
    const FILLABLE  =   [
        self::INSURANCE_CATEGORY_ID,
        self::INSURANCE_COMPANY_ID,
        self::FILTER_NAME,
        self::NAME,
        self::NAME_KZ,
        self::NAME_EN,
    ];
}
