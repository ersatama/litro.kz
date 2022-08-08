<?php

namespace App\Domain\Contracts;

class AutoPartParamContract extends MainContract
{
    const TABLE =   'auto_part_params';
    const FILLABLE  =   [
        self::AUTO_PART_CATEGORY_ID,
        self::AUTO_PART_TYPE_ID,
        self::FILTER,
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN,
    ];
}
