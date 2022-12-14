<?php

namespace App\Domain\Contracts;

class InsuranceSelectContract extends Contract
{
    const TABLE =   'insurance_selects';
    const FILLABLE  =   [
        self::FILTER_NAME,
        self::NAME,
        self::NAME_KZ,
        self::NAME_EN,
    ];
}
