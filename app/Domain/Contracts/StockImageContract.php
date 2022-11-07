<?php

namespace App\Domain\Contracts;

class StockImageContract extends Contract
{
    const TABLE =   'stock_images';
    const FILLABLE  =   [
        self::STOCK_ID,
        self::IMAGE_ID,
    ];
}
