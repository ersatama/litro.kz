<?php

namespace App\Domain\Contracts;

class AutoPartParamOptionContract extends MainContract
{
    const TABLE =   'auto_part_param_options';
    const FILLABLE  =   [
        self::AUTO_PART_PARAM_ID,
        self::AUTO_PART_TYPE_ID,
        self::FILTER,
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN,
    ];
}
