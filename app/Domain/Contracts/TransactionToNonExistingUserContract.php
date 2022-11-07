<?php

namespace App\Domain\Contracts;

class TransactionToNonExistingUserContract extends Contract
{
    const TABLE =   'transaction_to_non_existing_users';
    const FILLABLE  =   [
        self::SUM,
        self::EMAIL,
        self::PHONE,
    ];
}
