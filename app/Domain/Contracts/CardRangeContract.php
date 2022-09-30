<?php

namespace App\Domain\Contracts;

class CardRangeContract extends Contract
{
    const TABLE =   'card_ranges';
    const FILLABLE  =   [
        self::CITY_ID,
        self::CARD_ID,
        self::CURRENT_SYNCED,
        self::LEGAL_PERSON,
        self::C_FROM,
        self::C_TO,
        self::STATUS,
    ];
}
