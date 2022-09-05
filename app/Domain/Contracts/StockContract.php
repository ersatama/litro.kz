<?php

namespace App\Domain\Contracts;

class StockContract extends MainContract
{
    const TABLE =   'stocks';
    const FILLABLE  =   [
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN,
        self::DESCRIPTION,
        self::DESCRIPTION_KZ,
        self::DESCRIPTION_EN,
        self::IS_ACTIVE,
        self::IMAGE_ID,
        self::CATEGORY
    ];
}
