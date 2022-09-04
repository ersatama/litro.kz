<?php

namespace App\Domain\Contracts;

class OrderCardImportContract extends MainContract
{
    const TABLE =   'order_card_imports';
    const FILLABLE  =   [
        MainContract::USER_ID,
        MainContract::LINK
    ];
}
