<?php

namespace App\Domain\Contracts;

class SPartnerServiceCategoryContract extends Contract
{
    const TABLE =   's_partner_service_categories';
    const FILLABLE  =   [
        self::NAME,
        self::NAME_KZ,
        self::NAME_EN,
    ];
}
