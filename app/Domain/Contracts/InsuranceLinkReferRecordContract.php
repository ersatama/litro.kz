<?php

namespace App\Domain\Contracts;

class InsuranceLinkReferRecordContract extends MainContract
{
    const TABLE =   'insurance_link_refer_records';
    const FILLABLE  =   [
        self::USER_ID,
        self::INSURANCE_COMPANY_ID,
        self::LINK,
        self::BONUS_PERCENT,
        self::TYPE,
        self::SUM,
        self::REGION,
        self::BONUS_MALUS,
    ];
}
