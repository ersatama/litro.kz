<?php

namespace App\Domain\Contracts;

class PaymentSystemContract extends MainContract
{
    const TABLE =   'payment_systems';
    const FILLABLE  =   [
        self::TITLE,
    ];
}
