<?php

namespace App\Domain\Contracts;

class ServiceTypeContract extends Contract
{
    const TABLE =   'service_types';
    const FILLABLE  =   [
        self::TITLE,
        self::TITLE_EN,
        self::TITLE_KZ,
        self::POSITION,
        self::CARD_CATEGORY_ID
    ];
}
