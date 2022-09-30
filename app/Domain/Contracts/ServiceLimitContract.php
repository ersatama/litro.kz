<?php

namespace App\Domain\Contracts;

class ServiceLimitContract extends Contract
{
    const TABLE =   'service_limits';
    const FILLABLE  =   [
        self::SERVICE_ID,
        self::CARD_ID,
        self::LIMIT
    ];
}
