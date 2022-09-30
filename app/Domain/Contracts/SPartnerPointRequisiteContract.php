<?php

namespace App\Domain\Contracts;

class SPartnerPointRequisiteContract extends Contract
{
    const TABLE =   's_partner_point_requisites';
    const FILLABLE  =   [
        self::S_PARTNER_POINT_ID,
        self::ADDRESS,
        self::TITLE,
        self::BIN,
        self::IIK,
        self::BIK,
        self::BANK,
        self::INFO,
    ];
}
