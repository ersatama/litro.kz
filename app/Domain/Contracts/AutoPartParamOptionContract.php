<?php

namespace App\Domain\Contracts;

class AutoPartParamOptionContract extends Contract
{
    const TABLE =   'auto_part_param_options';
    const FILLABLE  =   [
        self::AUTO_PART_PARAM_ID,
        self::FILTER,
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN,
    ];
}
