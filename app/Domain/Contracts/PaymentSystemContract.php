<?php

namespace App\Domain\Contracts;

class PaymentSystemContract extends Contract
{
    const TABLE =   'payment_systems';
    const FILLABLE  =   [
        self::TITLE,
    ];
}
