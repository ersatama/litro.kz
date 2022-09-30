<?php

namespace App\Domain\Contracts;

class CurrencyContract extends Contract
{
    const TABLE =   'currencies';
    const FILLABLE  =   [
        self::ISO_TITLE,
    ];
}
