<?php

namespace App\Domain\Contracts;

class SPartnerPointCategoryContract extends Contract
{
    const TABLE =   's_partner_point_categories';
    const FILLABLE  =   [
        self::S_PARTNER_POINT_ID,
        self::S_PARTNER_SERVICE_CATEGORY_ID,
    ];
}
