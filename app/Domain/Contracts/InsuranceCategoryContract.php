<?php

namespace App\Domain\Contracts;

class InsuranceCategoryContract extends MainContract
{
    const TABLE =   'insurance_categories';
    const FILLABLE  =   [
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN
    ];
}
