<?php

namespace App\Domain\Contracts;

class CardServiceContract extends Contract
{
    const TABLE =   'card_services';
    const FILLABLE  =   [
        self::CARD_ID,
        self::SERVICE_ID,
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN,
        self::POSITION,
        self::VALUE,
        self::IS_CHOOSEABLE
    ];
}
