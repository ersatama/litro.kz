<?php

namespace App\Domain\Contracts;

class InsuranceCategoryContract extends Contract
{
    const TABLE =   'insurance_categories';
    const FILLABLE  =   [
        self::FILTER_NAME,
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN
    ];
}
