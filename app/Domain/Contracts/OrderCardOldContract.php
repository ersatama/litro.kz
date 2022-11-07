<?php

namespace App\Domain\Contracts;

class OrderCardOldContract extends Contract
{
    const TABLE =   'order_card_olds';
    const FILLABLE  =   [
        self::ORDER_CARD_ID,
        self::ORDER_CARD_ID_OLD,
    ];
}
