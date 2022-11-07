<?php

namespace App\Domain\Contracts;

class MoneyOperationTypeContract extends Contract
{
    const TABLE =   'money_operation_types';
    const FILLABLE  =   [
        self::FILTER,
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN
    ];
}
