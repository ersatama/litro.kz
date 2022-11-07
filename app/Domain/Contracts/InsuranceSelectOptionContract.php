<?php

namespace App\Domain\Contracts;

class InsuranceSelectOptionContract extends Contract
{
    const TABLE =   'insurance_select_options';
    const FILLABLE  =   [
        self::INSURANCE_SELECT_ID,
        self::FILTER_NAME,
        self::NAME,
        self::NAME_KZ,
        self::NAME_EN,
    ];
}
