<?php

namespace App\Domain\Contracts;

class InsuranceCompanyContract extends MainContract
{
    const TABLE =   'insurance_companies';
    const FILLABLE  =   [
        self::IMAGE_ID,
        self::NAME,
        self::NAME_KZ,
        self::NAME_EN,
        self::FILTER_NAME,
        self::DESCRIPTION,
        self::DESCRIPTION_KZ,
        self::DESCRIPTION_EN,
        self::OGPO_LINK,
        self::SITE,
        self::BONUS_PERCENT,
        self::PROVIDES_REQUIRED_INSURANCE,
        self::PROVIDES_ADDITIONAL_INSURANCE,
        self::REQUIRED_INSURANCE_BONUS,
        self::ADDITIONAL_INSURANCE_BONUS,
        self::KASKO_LINK,
        self::API_TOKEN,
    ];
}
