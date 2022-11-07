<?php

namespace App\Domain\Contracts;

class ServiceTypeContract extends Contract
{
    const TABLE =   'service_types';
    const FILLABLE  =   [
        self::CARD_CATEGORY_ID,
        self::IMAGE_ID,
        self::TITLE,
        self::TITLE_EN,
        self::TITLE_KZ,
        self::POSITION,
    ];
}
