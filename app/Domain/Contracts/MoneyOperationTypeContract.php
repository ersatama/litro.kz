<?php

namespace App\Domain\Contracts;

class MoneyOperationTypeContract extends MainContract
{
    const TABLE =   'money_operation_types';
    const FILLABLE  =   [
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN
    ];
}
