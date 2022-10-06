<?php

namespace App\Domain\Contracts;

class ServiceImageContract extends Contract
{
    const TABLE =   'service_images';
    const FILLABLE  =   [
        self::SERVICE_ID,
        self::IMAGE_ID
    ];
}
