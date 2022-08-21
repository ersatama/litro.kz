<?php

namespace App\Domain\Contracts;

class CarModelAveragePriceContract extends MainContract
{
    const TABLE =   'car_model_average_prices';
    const FILLABLE  =   [
        self::CAR_MODEL_ID,
        self::YEAR,
        self::AVERAGE_PRICE,
    ];
}
