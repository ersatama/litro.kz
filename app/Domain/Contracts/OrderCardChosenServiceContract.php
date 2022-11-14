<?php

namespace App\Domain\Contracts;

class OrderCardChosenServiceContract extends Contract
{
    const TABLE =   'order_card_chosen_services';
    const FILLABLE  =   [
        self::ORDER_CARD_ID,
        self::SERVICE_ID
    ];
}
