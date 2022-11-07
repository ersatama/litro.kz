<?php

namespace App\Domain\Contracts;

class OrderServiceServiceContract extends Contract
{
    const TABLE =   'order_service_services';
    const FILLABLE  =   [
        self::ORDER_SERVICE_ID,
        self::SERVICE_ID,
        self::PRICE
    ];
}
