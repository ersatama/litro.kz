<?php

namespace App\Domain\Contracts;

class CurrencyContract extends MainContract
{
    const TABLE =   'currencies';
    const FILLABLE  =   [
        self::ISO_TITLE,
    ];
}
