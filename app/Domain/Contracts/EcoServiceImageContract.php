<?php

namespace App\Domain\Contracts;

class EcoServiceImageContract extends Contract
{
    const TABLE =   'eco_service_images';
    const FILLABLE  =   [
        self::ECO_SERVICE_ID,
        self::IMAGE_ID
    ];
}
