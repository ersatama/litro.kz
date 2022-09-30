<?php

namespace App\Domain\Contracts;

class PartnerContract extends Contract
{
    const TABLE =   'partners';
    const FILLABLE  =   [
        self::NAME,
        self::IMAGE_ID,
        self::POSITION,
        self::LINK,
        self::TOKEN,
        self::IS_ACTIVE,
    ];
}
