<?php

namespace App\Domain\Contracts;

class TransactionContract extends MainContract
{
    const TABLE =   'transactions';
    const FILLABLE  =   [
        self::USER_FROM,
        self::USER_TO,
        self::BALANCE,
        self::DELTA_BALANCE,
        self::COMMENT,
        self::TYPE,
        self::EMAIL,
    ];
}
