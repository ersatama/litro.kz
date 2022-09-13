<?php

namespace App\Domain\Contracts;

class LawyerServiceContract extends MainContract
{
    const TABLE =   'lawyer_services';
    const FILLABLE  =   [
        self::FILTER_NAME,
        self::NAME,
        self::NAME_KZ,
        self::NAME_EN
    ];
}
