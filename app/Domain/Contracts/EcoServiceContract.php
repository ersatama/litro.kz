<?php

namespace App\Domain\Contracts;

class EcoServiceContract extends Contract
{
    const TABLE =   'eco_services';
    const FILLABLE  =   [
        self::POSITION,
        self::STATUS,
        self::TYPE,
        self::TITLE,
        self::TITLE_KZ,
        self::TITLE_EN,
        self::DESCRIPTION,
        self::DESCRIPTION_KZ,
        self::DESCRIPTION_EN,
    ];
}
